<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{

    public function clone_poster_to_public(string $file_location)
    {
        $file = file_get_contents($file_location);
        $new_file_name = floor(microtime(true) * 1000) . "." . pathinfo($file_location, PATHINFO_EXTENSION);
        $new_file_path = public_path("uploads/" . $new_file_name);
        file_put_contents($new_file_path, $file);
        return $new_file_name;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("films")->upsert([
            [
                "id" => 1,
                "title" => "Transformers",
                "year" => 2007,
                "summary" => "Transformers robot-robot.",
                "poster" => $this->clone_poster_to_public(__DIR__ . "/assets/films/Transformers.jpg"),
                "genre_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "title" => "Frieren",
                "year" => 2023,
                "summary" => "Frieren, her journey after defeating the demon lor...",
                "poster" => $this->clone_poster_to_public(__DIR__ . "/assets/films/Frieren - Beyond Journey's End.jpg"),
                "genre_id" => 3,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 3,
                "title" => "Home Alone",
                "year" => 2003,
                "summary" => "Di rumah sendirian",
                "poster" => $this->clone_poster_to_public(__DIR__ . "/assets/films/Home Alone.jpg"),
                "genre_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 4,
                "title" => "Back to The Future",
                "year" => 1990,
                "summary" => "Balik ke masa depan",
                "poster" => $this->clone_poster_to_public(__DIR__ . "/assets/films/Back to The Future.jpg"),
                "genre_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 5,
                "title" => "Rick and Morty",
                "year" => 2016,
                "summary" => "walawe walawe",
                "poster" => $this->clone_poster_to_public(__DIR__ . "/assets/films/Rick and Morty.jpg"),
                "genre_id" => 3,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 6,
                "title" => "The Lord of The Rings",
                "year" => 2005,
                "summary" => "Lorem ipsum dolor sit amet, consectetur adipiscing...",
                "poster" => $this->clone_poster_to_public(__DIR__ . "/assets/films/Lord of The Rings.jpg"),
                "genre_id" => 4,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ], ["id"]);
    }
}
