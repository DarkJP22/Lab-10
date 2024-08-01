<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        // Aplica el middleware 'auth' solo a ciertos métodos
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        if (Auth::check()) {
            $tasks = Task::where('user_id', Auth::id())->get();
        } else {
            $tasks = collect(); 
        }

        return view('tasks.index', ['tasks' => $tasks]);
    
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create', ['priorities' => Priority::all(), 'users' => User::all(), 'labels' => Label::all()]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority_id = $request->priority;
        $task->user_id = $request->user;
        $task->save();
        $task->labels()->attach($request->labels);
        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task, 'priorities' => Priority::all(), 'users' => User::all(), 'labels' => Label::all()]);
    }

    public function update(Request $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority_id = $request->priority;
        $task->user_id = $request->user;
        $task->save();
        $task->labels()->sync($request->labels);
        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    public function complete(Task $task)
    {
        $task->completed = true;
        $task->save();
        return redirect('/tasks');
    }
}