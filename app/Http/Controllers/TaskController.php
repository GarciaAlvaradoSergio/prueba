<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
        ]);

        Task::create($request->all());
        return redirect('/');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect('/');
    }


    public function destroy(Request $request)
    {

        $request->validate([
            'tasksToDelete' => 'required|array',
        ]);

        Task::destroy($request->input('tasksToDelete'));

        return redirect('/');
    }
}
