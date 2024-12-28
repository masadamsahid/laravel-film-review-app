<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FilmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genres = Genre::all();

        return view("pages.films.create", ["genres" => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "title" => "required|max:100",
            "year" => "integer|min:0",
            "summary" => "required|min:10|max:20000",
            "poster" => "required|image|mimes:png,jpg,jpeg",
            "genre_id" => "exists:genres,id",
        ]);

        $poster_file_name = floor(microtime(true) * 1000) . "." . $request->poster->extension();
        $request->poster->move(public_path("uploads"), $poster_file_name);

        $new_film = new Film;

        $new_film->title = $validated["title"];
        $new_film->year = $validated["year"];
        $new_film->summary = $validated["summary"];
        $new_film->poster = $poster_file_name;
        $new_film->genre_id = $validated["genre_id"];

        $new_film->save();

        return redirect("/films");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $film = Film::find($id);
        // dd($film->reviews);

        return view("pages.films.show", ["film" => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $film = Film::find($id);
        $genres = Genre::all();

        return view("pages.films.edit", ["film" => $film, "genres" => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            "title" => "required|max:100",
            "year" => "integer|min:0",
            "summary" => "required|min:10|max:20000",
            "poster" => "image|mimes:png,jpg,jpeg",
            "genre_id" => "exists:genres,id",
        ]);


        $updated_film = Film::find($id);

        $updated_film->title = $validated["title"];
        $updated_film->year = $validated["year"];
        $updated_film->summary = $validated["summary"];
        $updated_film->genre_id = $validated["genre_id"];

        if ($request->has('poster')) {
            File::delete('uploads/' . $updated_film->poster);

            $poster_file_name = floor(microtime(true) * 1000) . "." . $request->poster->extension();
            $request->poster->move(public_path("uploads"), $poster_file_name);
            $updated_film->poster = $poster_file_name;
        }

        $updated_film->save();

        return redirect("/films/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $film = Film::find($id);

        if ($film->poster) {
            File::delete("uploads/" . $film->poster);
        }
        $film->delete();

        return redirect("/films");
    }


    // Film Reviews Controllers
    public function create_review(Request $request, $film_id)
    {
        $film = Film::find($film_id);

        return view('pages.films.create_review', ['film' => $film]);
    }

    public function store_review(Request $request, $film_id)
    {
        $validated = $request->validate([
            "body" => "required|max:20000",
            "points" => "required|integer|min:0|max:10",
        ]);

        $curr_user = Auth::user();

        $review = new Review;

        $review->user_id = $curr_user->id;
        $review->film_id = $film_id;

        $review->points = $validated["points"];
        $review->body = $validated["body"];

        $review->save();

        return redirect("/films/" . $film_id);
    }


    public function update_review(Request $request, $film_id)
    {
        $validated = $request->validate([
            "body" => "required|max:20000",
            "points" => "required|integer|min:0|max:10",
        ]);

        $curr_user = Auth::user();

        $review = Review::where("user_id", $curr_user->id)
            ->where("film_id", $film_id)
            ->first();

        $review->user_id = $curr_user->id;
        $review->film_id = $film_id;

        $review->points = $validated["points"];
        $review->body = $validated["body"];

        $review->save();

        return redirect("/films/" . $film_id);
    }

    public function delete_review(Request $request, $film_id)
    {

        $curr_user = Auth::user();

        $review = Review::where("user_id", $curr_user->id)
            ->where("film_id", $film_id)
            ->first();

        $review->delete();

        return redirect('/films/' . $film_id);
    }
}
