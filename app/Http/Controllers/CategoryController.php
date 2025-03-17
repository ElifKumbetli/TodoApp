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
    //request:istek 
    //validate:doğrulamak
    public function store(StoreCategoryRequest $request)
    {        
        //Request bunun yerine farklı bir kullanım yapılabilir. php artisan make:request
        //Daha önceden store fonksiyonun içinde Request yazıyordu, bunu StoreCategoryRequest yaptım.
    
   
        // Kategoriyi oluştur
        $category = Category::create($request->validated());

        // TODO: Diğer mesajı da göster.
        // Eğer kategori başarıyla eklenmişse, success mesajı ile dön
        if ($category) {
            return redirect()->route('categories.index')->with('success', 'Kategori eklendi.');
        } else {
            return redirect()->route('categories.index')->with('error', 'Kategori eklenemedi.');
        }
    }
}
