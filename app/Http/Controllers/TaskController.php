<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function index()
    {
        //TODO: with kullanımına bak, ('category') nedir bak!

        $tasks = Task::with('category')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //TODO: Uzunluk gibi şeyler eklenebeilir.
        $request->validate([
            'title' => 'required|string|min:5|max:50',
            'category_id' => 'required|exists:categories,id',
            'is_completed' => 'required|boolean',
        ]);
        

        Task::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_completed' => $request->is_completed,
        ]);
        // TODO: Atama şekline bak(https://laravel.com/docs/4.2/eloquent#insert-update-delete).
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));

    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'is_completed' => 'required|boolean',
        ]);

        $task->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_completed' => $request->is_completed,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
