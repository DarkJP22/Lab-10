<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function showtasks(){
        $tasks = Task::select('id', 'name')->get();
        return response()->json($tasks);
    }

    public function UserTasks($userId)
    {
        $tasks = Task::select('id', 'name')->where('user_id', $userId)->get();
        return response()->json($tasks);
    }


    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        if (Auth::user()->can('update', $task)) {
            $task->update($request->only('name'));
            return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
        } else {
            return response()->json(['error' => 'Unauthorized action'], 403);
        }
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);

        if (Auth::user()->can('delete', $task)) {
            $task->delete();
            return response()->json(['message' => 'Task deleted successfully']);
        } else {
            return response()->json(['error' => 'Unauthorized action'], 403);
        }
    }
}
