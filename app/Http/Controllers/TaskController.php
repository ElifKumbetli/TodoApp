<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;


class TaskController extends Controller
{
    public function index()
    {
        //session:oturum
        //TODO: with kullanımına bak, ('category') nedir bak!
        $tasks = Auth::user()->tasks;   
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    //TODO: Diğer şekilde kullanımına bak, iyileştir.
    //StoreTaskRequest sınıfı oluşturdum, doğrulamaları ve kuralları orada yazdım, daha temiz bir kod yapısı oldu.

    public function store(StoreTaskRequest  $request)
    {
        //TODO: Validation mesajları arayüzde gösterilmiyor, buraya bak.
        //Hem başarılı hem de başarısız mesajları gösteriliyor.
         
        Task::create([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'is_completed' => $request->is_completed,
        'user_id' => Auth::id(), 
        ]);

        // TODO: Atama şekline bak(https://laravel.com/docs/4.2/eloquent#insert-update-delete).
        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla eklendi.');
    }

   
    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(StoreTaskRequest  $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Görev başarıyla güncellendi.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('silindi', 'Görev başarıyla silindi.');
    }
}
