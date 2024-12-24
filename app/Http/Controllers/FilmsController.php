<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilmsController extends Controller
{
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
            "year" => "integer",
            "summary" => "required|min:10|max:20000",
            "poster" => "required|image|mimes:png,jpg,jpeg",
            "genre_id" => "exists:genres,id",
        ]);

        $poster_file_name = time() . "." . $request->poster->extension();
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
            "year" => "integer",
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

            $poster_file_name = time() . "." . $request->poster->extension();
            $request->poster->move(public_path("uploads"), $poster_file_name);
            $updated_film->poster = $poster_file_name;
        }

        $updated_film->save();

        return redirect("/films");
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
}