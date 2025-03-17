<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;       
use Database\Seeders\TaskSeeder; 
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    public function run():void
    {
        //TODO: Seeder ları buraya eklemeye bak(tanımlamaya).
        
        $this->call([
            UserSeeder::class,        
            CategorySeeder::class,   
            TaskSeeder::class,        
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
