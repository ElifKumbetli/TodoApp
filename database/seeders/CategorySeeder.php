<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO: Bir seeder daha eklenecek.
        //TODO: Her kategori ile ilişkili Task ekle, 2 kategori daha eklenecek.
        
        //Category::create(['name' => 'DenemeKategori1']);

        DB::table('categories')->insert([
            ['name' => 'Yazılım'],
            ['name' => 'Kişisel'],
            ['name' => 'Diğer'],
        ]);
        
    }
}
