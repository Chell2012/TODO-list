<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('tags')->get();
        return response()->json($tasks);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text
        ]);

        if ($request->has('tags')) {
            $tagIds = [];
            foreach ($request->tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $task->tags()->sync($tagIds);
        }

        return response()->json($task->load('tags'), 201);
    }

    public function update(TaskRequest $request)
    {
        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text
        ]);

        if ($request->has('tags')) {
            $tagIds = [];
            foreach ($request->tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $task->tags()->sync($tagIds);
        }

        return response()->json($task->load('tags'), 201);
    }
}
