<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    // TODO: fillabe kullanmadan da bak!
    use HasFactory;

    //fill:Doldurmak 
    //fillable:Doldurulabilir
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
