<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    
    //authorize: yetki vermek
    public function authorize()
    {
        return true; //Burası false olduğunda yetkisiz olmuştu o nedenle true yaptım.
    }

    
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kategori adı gereklidir.',
            'name.min' => 'Kategori adı en az 3 karakter olmalıdır.',
            'name.max' => 'Kategori adı en fazla 50 karakter olabilir.',
            
        ];   
}
}