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
     */
    public function run(): void
    {
        //
        DB::table("users")->upsert([
            ["id" => 1, "name" => "user1", "email" => "user1@mail.com", "password" => Hash::make("password1"), "created_at" => now(), "updated_at" => now()],
            ["id" => 2, "name" => "user2", "email" => "user2@mail.com", "password" => Hash::make("password2"), "created_at" => now(), "updated_at" => now()],
            ["id" => 3, "name" => "user3", "email" => "user3@mail.com", "password" => Hash::make("password3"), "created_at" => now(), "updated_at" => now()],
            ["id" => 4, "name" => "user4", "email" => "user4@mail.com", "password" => Hash::make("password4"), "created_at" => now(), "updated_at" => now()],
            ["id" => 5, "name" => "user5", "email" => "user5@mail.com", "password" => Hash::make("password5"), "created_at" => now(), "updated_at" => now()],
        ], ["id"],);
    }
}
