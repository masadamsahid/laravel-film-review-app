<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastSeeder extends Seeder
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
        DB::table("casts")->upsert([
            [
                "id" => 1,
                "name" => "Karolina Grabowska",
                "age" => 28,
                "avatar" => $this->clone_poster_to_public( __DIR__ . "/assets/casts/pexels-karolina-grabowska-4467687.jpg"),
                "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium nisi vehicula semper mattis. Donec id urna quis ipsum hendrerit efficitur. Cras facilisis magna ut posuere imperdiet. Donec posuere sodales porttitor. Ut id luctus nulla, eget fringilla est. Morbi vulputate tellus eget fringilla euismod. Duis tempus faucibus neque, consectetur pulvinar ex luctus ut. Duis mattis arcu at libero vulputate lacinia ut et risus. Aliquam erat volutpat. Ut pretium lorem id nisl placerat, non egestas lacus egestas. Fusce tincidunt fermentum urna ac malesuada.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "name" => "Pavel Danilyuk",
                "age" => 42,
                "avatar" => $this->clone_poster_to_public( __DIR__ . "/assets/casts/pexels-pavel-danilyuk-8424588.jpg"),
                "bio" => "Vestibulum facilisis blandit magna id lobortis. Nunc eu elit eleifend eros consequat bibendum sed in nulla. Curabitur massa turpis, eleifend non efficitur ut, semper nec sem. Mauris hendrerit mattis placerat. Morbi pellentesque, neque nec gravida elementum, quam dui maximus dui, vel euismod quam velit et erat. Sed tincidunt ipsum sit amet eros eleifend tempor. Duis varius sodales nunc ut euismod. Aliquam leo diam, hendrerit ac mi eget, volutpat feugiat velit. Donec ultrices libero in diam pretium malesuada. Nulla id ornare quam. Proin mi ipsum, euismod at nisi sit amet, venenatis euismod sapien. Curabitur at mollis ex. Aenean eget elit egestas, scelerisque ante et, tincidunt nibh. Suspendisse euismod feugiat libero eu elementum. Quisque in augue accumsan, pulvinar purus ac, aliquet sem. Nulla ac felis enim.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 3,
                "name" => "Shvetsa",
                "age" => 33,
                "avatar" => $this->clone_poster_to_public( __DIR__ . "/assets/casts/pexels-shvetsa-5325105.jpg"),
                "bio" => "Nunc purus augue, congue viverra consectetur et, consectetur eu diam. Sed imperdiet felis sapien. Sed lacus erat, vehicula ac ex et, varius consequat metus. In hac habitasse platea dictumst. Ut vitae metus sollicitudin, iaculis tortor eu, laoreet enim. Aliquam ac nisi aliquet, interdum magna vel, fermentum metus. Nunc ac nunc non arcu consectetur finibus vitae non risus. Suspendisse condimentum lectus lobortis, consectetur mauris non, sollicitudin ligula. Ut sollicitudin tempus viverra. Suspendisse vel sem vel sem vulputate fermentum nec nec dolor. Morbi vel mauris aliquet, semper nisl eget, molestie ex. Quisque quis odio libero.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 4,
                "name" => "Sora Shimazaki",
                "age" => 49,
                "avatar" => $this->clone_poster_to_public( __DIR__ . "/assets/casts/pexels-sora-shimazaki-5668774.jpg"),
                "bio" => "Aliquam auctor viverra ante vel mattis. Cras vitae est sed ipsum gravida tincidunt nec et lectus. Mauris congue bibendum orci et tristique. Cras venenatis vestibulum porttitor. Fusce vitae massa aliquam, sagittis ex vel, condimentum nisi. Ut rutrum tellus sit amet quam tempus auctor. Nam dui velit, mattis sit amet suscipit quis, aliquam quis nisi. Nam sollicitudin molestie urna, iaculis fermentum purus rhoncus et. Cras egestas semper sollicitudin. Aliquam vulputate semper lorem, ut porta nulla ornare vitae. In quis ultricies sem, eu imperdiet tellus. Sed tristique aliquet laoreet. Ut non bibendum purus. Quisque non est posuere, mattis diam nec, consequat nibh.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 5,
                "name" => "Itay Verchik",
                "age" => 29,
                "avatar" => $this->clone_poster_to_public( __DIR__ . "/assets/casts/pexels-itay-verchik-1150587-16771673.jpg"),
                "bio" => "Fusce posuere at metus a accumsan. Vivamus aliquet elit in risus gravida, vitae tempor odio elementum. Phasellus a augue nec metus placerat porta ac vitae mauris. Quisque ac pulvinar tellus, a imperdiet tellus. Mauris tempus dictum enim ut porta. Suspendisse aliquet velit mauris, eu rutrum magna facilisis nec. Nunc a ultrices erat. Proin eleifend faucibus porttitor. Praesent vitae placerat nisl. Nulla id lectus at felis lacinia faucibus.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 6,
                "name" => "Emmy E.",
                "age" => 30,
                "avatar" => $this->clone_poster_to_public( __DIR__ . "/assets/casts/pexels-emmy-e-1252107-2381069.jpg"),
                "bio" => "Aliquam molestie nec nibh non pretium. Nunc id tincidunt nisi, ac ultricies massa. Nullam tincidunt urna sit amet mattis rhoncus. Etiam elementum, sapien eget interdum tincidunt, neque diam condimentum augue, non facilisis elit erat id odio. Proin venenatis elit tortor, at dapibus libero consequat vel. Sed accumsan, dui fermentum tempus bibendum, mauris metus congue ante, vitae vulputate enim mi a lectus. Vestibulum id augue mi. In scelerisque, sapien sit amet ultrices vehicula, erat tellus accumsan libero, et tincidunt purus lorem a arcu. Mauris congue odio diam, vitae fringilla turpis iaculis quis. Proin blandit arcu vitae scelerisque feugiat.",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ], ["id"]);
    }
}
