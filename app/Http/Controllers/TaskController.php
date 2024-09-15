<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('todo', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['task' => 'required|string|max:255']);
        
        Task::create([
            'name' => $request->task,
            'completed' => false,
        ]);

        return redirect()->back();
    }

    public function update(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
