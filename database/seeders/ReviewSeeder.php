<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function sleep_get_rand(){
        $random_point = rand(0,10);
        sleep($random_point);
        return $random_point;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("reviews")->upsert([
            ["user_id"=> 1, "film_id" => 1, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit"],
            ["user_id"=> 2, "film_id" => 1, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Proin scelerisque diam id purus volutpat, et dignissim neque tincidunt"],
            ["user_id"=> 4, "film_id" => 1, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Nunc finibus magna id tristique condimentum"],
            ["user_id"=> 3, "film_id" => 1, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "In sed ligula a quam facilisis blandit"],
            
            ["user_id"=> 2, "film_id" => 2, "points" => 10, "created_at" => now(), "updated_at"=> now(), "body" => "Aliquam volutpat justo vel purus tempor, in mattis est elementum"], // Frieren-sama saikyouuuuu
            
            ["user_id"=> 2, "film_id" => 3, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Nam lobortis sapien quis dui semper accumsan"],
            ["user_id"=> 3, "film_id" => 3, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Mauris venenatis urna sit amet sem ornare rhoncus"],
            ["user_id"=> 5, "film_id" => 3, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Nunc pretium tortor a massa tincidunt volutpat"],
            ["user_id"=> 1, "film_id" => 3, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Aliquam finibus nisl eget vestibulum fringilla"],
            ["user_id"=> 4, "film_id" => 3, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Nulla eu odio eu enim condimentum aliquam in eget lectus"],
            
            ["user_id"=> 4, "film_id" => 4, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Donec luctus ligula quis turpis malesuada, ac congue ligula varius"],
            ["user_id"=> 1, "film_id" => 4, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Quisque vel erat egestas, lobortis metus sit amet, vehicula dolor"],
            ["user_id"=> 2, "film_id" => 4, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Phasellus hendrerit erat non odio pharetra interdum"],
            ["user_id"=> 3, "film_id" => 4, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Fusce ut lacus finibus, eleifend mauris in, laoreet orci"],
            ["user_id"=> 5, "film_id" => 4, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Cras vulputate orci sed metus imperdiet scelerisque"],

            ["user_id"=> 1, "film_id" => 5, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Aenean eget erat sit amet nibh pretium vulputate"],
            ["user_id"=> 2, "film_id" => 5, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Suspendisse laoreet nunc id ligula iaculis, eget dapibus dui consectetur"],
            
            ["user_id"=> 3, "film_id" => 6, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Proin sed massa consequat, porttitor lectus ut, cursus ex"],
            ["user_id"=> 1, "film_id" => 6, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Aliquam gravida dolor at justo tempor, sed suscipit dui porttitor"],
            ["user_id"=> 5, "film_id" => 6, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "Nullam sit amet dolor ullamcorper, fringilla massa id, tempus nunc"],
            ["user_id"=> 2, "film_id" => 6, "points" => $this->sleep_get_rand(), "created_at" => now(), "updated_at"=> now(), "body" => "In ornare ex sit amet elementum ultrices"],
        ],["user_id", "film_id"]);
    }
}
