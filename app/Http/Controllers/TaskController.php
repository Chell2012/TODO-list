<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = isset($request->user()->id) ? $request->user() : null;
        if (isset($request->api_token)) $user = User::where('api_token', $request->api_token)->first()->id;
        $tasks = Task::with('tags')->where('user_id', $user->id)->get();
        return $request->expectsJson() ?
            response()->json($tasks) :
            response()->view('dashboard', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        response()->redirectTo('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $tags = [];
        $tagIds = [];
        $task = Task::create([
            'user_id' => $request->user() ? $request->user()->id : User::where('api_token', $request->api_token)->first()->id,
            'title' => $request->title,
            'text' => $request->text
        ]);
        if ($request->has('tags_string')){
            $tags = explode(" ", $request->tags_string);
        }
        if ($request->has('tags')){
            $tags = $request->tags;
        }
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(["title" => $tagName]);
            $tagIds[] = $tag->id;
        }
        $task->tags()->sync($tagIds);
        return $request->expectsJson() ?
            response()->json($task->load('tags'), 201) :
            response()->redirectTo('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        response()->redirectTo('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        response()->redirectTo('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {

        $task = Task::find($id);
        if ($request->user()->id == $task->user_id) {
            $tags = [];
            if ($request->has('tags_string')){
                $tags = explode(' ',$request->tags_string);
            }
            if ($request->has('tags')){
                $tags = $request->tags;
            }
            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagIds[] = Tag::firstOrCreate(['title' => $tagName])->id;
            }

            foreach ($task ->tags()->get() as $tag){
                if ($tag->tasks()->count() == 1 && !in_array($tag->id, $tagIds)){
                    $tag->delete();
                }
            }
            $task->tags()->sync($tagIds);

            return $request->expectsJson() ?
                response()->json($task->load('tags'), 201) :
                response()->redirectTo('dashboard');
        }
        return $request->expectsJson() ?
            response()->json(['message' => 'You are not allowed to edit this task'], 403) :
            response()->redirectTo('dashboard');
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     *
     *   Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $task = Task::find($id);
        if (Auth::id() == $task->user_id) {
            foreach ($task->tags()->get() as $tag){
                if ($tag->tasks()->count() == 1){
                    $tag->delete();
                }
            }
            $task->delete();
            return $request->expectsJson() ?
                response()->json(true, 201) :
                response()->redirectTo('dashboard');
        }
        return $request->expectsJson() ?
            response()->json(['message' => 'You are not allowed to delete this task'], 403) :
            response()->redirectTo('dashboard');
    }
}

