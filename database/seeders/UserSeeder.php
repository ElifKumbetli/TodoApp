<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'elif',
                'email' => 'elifkumbetli@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'ayşe',
                'email' => 'ayşe@gmail.com',
                'password' => Hash::make('123456'),
            ],
        ]);
    }
}
