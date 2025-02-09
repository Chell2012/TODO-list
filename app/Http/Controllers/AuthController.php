<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    /**
     * Страница регистрации
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('auth.create');
    }

    public function store(RegisterRequest $request): Response|JsonResponse
    {
        $user = User::create($request->only('name', 'email', 'password'));

        if (isset($user)) {
            event(new Registered($user));
        }
        if (request()->routeIs('*.api')) {
            return response()->json([
                'message' => 'User registered successfully',
                'api_token' => $user->api_token
            ], 201);
        } else {
            return response()->view('welcome');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            if (request()->routeIs('*.api')) {
                return response()->json(['message' => 'Unauthorized'], 401);
            } else {
                return response()->view('auth.login');
            }
        }
        if (request()->routeIs('*.api')) {
            return response()->json(['api_token' => $user->api_token]);
        }else{
            return response()->view('welcome');
        }
    }
    /**
     *
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user): Response
    {
        return response()->view('auth.show',[
            'user' => $user
        ]);
    }
}
