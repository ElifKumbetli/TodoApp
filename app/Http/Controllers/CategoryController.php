<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCategoryRequest;

use App\Models\Category;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        //Request bunun yerine farklı bir kullanım yapılabilir. php artisan make:request
        Category::create($request->validated());

        // TODO: Mesaj görünmüyor, tekrar bak.
        return redirect()->route('categories.index')->with('success', 'Kategori eklendi.');
    }
}
