<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("genres")->upsert([
            [
                "id" => 1,
                "name" => "Sci-Fi",
                "desc" => "Science Fiction films",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "name" => "Comedy",
                "desc" => "Lucu pokoknya hahaha",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 3,
                "name" => "Anime",
                "desc" => "Animated Films/Series",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 4,
                "name" => "Fantasy",
                "desc" => "Fantasy films",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 5,
                "name" => "Action",
                "desc" => "Film Aksi",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 6,
                "name" => "Adventure",
                "desc" => "Adventure films here",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 7,
                "name" => "Drama",
                "desc" => "Dram films",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 8,
                "name" => "Documentary",
                "desc" => "Film dokumenter",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 9,
                "name" => "Myth",
                "desc" => "Films based on mythologies",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 10,
                "name" => "Horror",
                "desc" => "Hiiii takuuut 👻",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 11,
                "name" => "School",
                "desc" => "Sekolah gan 👨‍🎓",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 12,
                "name" => "Game Show",
                "desc" => "Wah seru-seruan gais",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 13,
                "name" => "Lifestyle",
                "desc" => "Nonton film sambil nambah wawasan gaya hidup 💅",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 14,
                "name" => "Reality",
                "desc" => "Reality shows but actually not real",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 15,
                "name" => "Romance",
                "desc" => "Dimabuk cinthaaaaaaaaaaaaaaaaaaa....",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 16,
                "name" => "Thriller",
                "desc" => "Menegangkan guys. Hii takut 🔪",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 17,
                "name" => "War",
                "desc" => "Sibuk perang",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 18,
                "name" => "Windah Basudara",
                "desc" => "Alamak siappa pulak ni?",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 19,
                "name" => "Historical",
                "desc" => "Berdasarkan sejarah",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 20,
                "name" => "Psychological",
                "desc" => "Wha wha wha wha",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 21,
                "name" => "Parody",
                "desc" => "An alternative of your favourite films",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 22,
                "name" => "Battle",
                "desc" => "Love fights?",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 23,
                "name" => "3D",
                "desc" => "Blender made?",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 24,
                "name" => "Gourmet",
                "desc" => "Makes you feel hungry 😋",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 25,
                "name" => "Supernatural",
                "desc" => "😱😱😱😱😱😱😱😱😱😱😱😱😱😱",
                "created_at" => now(),
                "updated_at" => now()
            ]

        ], ["id"]);
    }
}
