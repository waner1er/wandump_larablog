<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();
        \App\Models\Post::factory(50)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => "user"
        ]);
        DB::table('ages')->insert([
            ['name' => 'baby',],
            ['name' => 'mat_child',],
            ['name' => 'elem_child',],
            ['name' => 'pre_teen',],
            ['name' => 'teenager',],
            ['name' => 'family',],
        ]);
        DB::table('categories')->insert([
            ['name' => 'unicorn_and_princess',],
            ['name' => 'zen',],
            ['name' => 'monsters_and_sorcerers',],
            ['name' => 'cute_animals',],
            ['name' => 'mom_and_dad',],
        ]);



    }
}
