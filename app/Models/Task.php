<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //TODO:   use HasFactory bak.
    protected $fillable = ['title', 'category_id', 'is_completed'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
