<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categoryYazilim = DB::table('categories')->where('name', 'Yazılım')->first();
        if ($categoryYazilim) {
            DB::table('tasks')->insert([
                [
                    'title' => 'Laravel Öğren',
                    'description' => 'Yazılım kategorisi için görev 1.',
                    'category_id' => $categoryYazilim->id,
                    'user_id' => 1, 
                    'is_completed'=>1 ,
                ],
                [
                    'title' => 'Yazılım Görevi 2',
                    'description' => 'Yazılım kategorisi için görev 2.',
                    'category_id' => $categoryYazilim->id,
                    'user_id' => 1,
                    'is_completed'=>1 ,
                ],
            ]);
        }

        
        $categoryKisisel = DB::table('categories')->where('name', 'Kişisel')->first();
        if ($categoryKisisel) {
            DB::table('tasks')->insert([
                [
                    'title' => 'Kitap oku',
                    'description' => 'Kişisel kategorisi için görev 1.',
                    'category_id' => $categoryKisisel->id,
                    'user_id' => 1, 
                    'is_completed'=>0 ,
                ],
                [
                    'title' => 'Yürüyüşe çık',
                    'description' => 'Kişisel kategorisi için görev 2.',
                    'category_id' => $categoryKisisel->id,
                    'user_id' => 2,
                    'is_completed'=>0 ,
                ],
            ]);
        }

        $categoryDiger = DB::table('categories')->where('name', 'Diğer')->first();
        if ($categoryDiger) {
            DB::table('tasks')->insert([
                [
                    'title' => 'Alışveriş yap',
                    'description' => 'Diğer kategorisi için görev 1.',
                    'category_id' => $categoryDiger->id,
                    'user_id' => 1, 
                    'is_completed'=>0 ,
                ],
                [
                    'title' => 'kendinle vakit geçir',
                    'description' => 'Diğer kategorisi için görev 2.',
                    'category_id' => $categoryDiger->id,
                    'user_id' => 1,
                    'is_completed'=>1 ,
                ],
            ]);
        }
    }
}