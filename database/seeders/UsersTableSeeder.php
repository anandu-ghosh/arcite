<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // date_default_timezone_set('Asia/Kolkata');
        DB::table('users')->insert([
            'name' => 'Jayan',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can insert more dummy data as needed
    }
}
