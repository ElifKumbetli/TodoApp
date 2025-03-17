<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:50',
            'category_id' => 'required|exists:categories,id',
            'is_completed' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.min' => 'Başlık en az 5 karakter olmalıdır.',
            'category_id.required' => 'Kategori seçimi zorunludur.',
            'category_id.exists' => 'Seçilen kategori geçerli değil.',
            'is_completed.required' => 'Tamamlanma durumu zorunludur.',
            'is_completed.boolean' => 'Tamamlanma durumu sadece doğru veya yanlış olabilir.',
        ];
    }
}
