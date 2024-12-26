<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $genres_records = Genre::all()->sortBy('name');
        $genres = array();

        foreach ($genres_records as $g) {
            $genres[$g->name[0]][] = $g;
        }

        // dd($genres, $genres["A"], $genres["A"][0], $genres["A"][0]->id);

        return view("pages.genres.index", ["genres"=> $genres]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("pages.genres.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "name" => "required|max:100",
            "desc" => "max:20000",
        ]);

        $new_genre = new Genre;
        
        $new_genre->name = $validated["name"];
        $new_genre->desc = $validated["desc"];

        $new_genre->save();

        return redirect("/genres");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $genre = Genre::find( $id );
        $films = Film::where("genre_id", $id)->get();

        return view("pages.genres.show", ["genre"=> $genre, "films"=> $films]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $genre = Genre::find( $id );

        return view("pages.genres.edit", ["genre"=> $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            "name" => "required|max:100",
            "desc" => "max:20000",
        ]);

        $genre = Genre::find( $id );
        $genre->name = $validated["name"];
        $genre->desc = $validated["desc"];

        $genre->save();

        return redirect("/genres");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $genre = Genre::find( $id );
        $genre->delete();

        return redirect("/genres");
    }
}
