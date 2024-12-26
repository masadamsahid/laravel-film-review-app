<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //
    public function index()
    {
        $casts = DB::table("casts")->get();
        return view('pages.casts.index', ['casts' => $casts]);
    }

    public function create()
    {
        return view('pages.casts.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|min:0',
            'bio' => 'required|max:3000',
            "avatar" => "required|image|mimes:png,jpg,jpeg",
        ]);

        $avatar_file_name = time() . "." . $request->avatar->extension();
        $request->avatar->move(public_path("uploads"), $avatar_file_name);

        $new_cast = new Cast;

        $new_cast->name = $validated["name"];
        $new_cast->age = $validated["age"];
        $new_cast->bio = $validated["bio"];
        $new_cast->avatar = $avatar_file_name;

        $new_cast->save();

        // return view('pages.casts.store', ['is_success' => true, 'cast' => $cast_data]);
        return redirect('/casts');
    }

    public function show(Request $request, string $id)
    {
        $cast = DB::table('casts')->find($id);
        return view('pages.casts.show', ['cast' => $cast]);
    }

    public function edit(Request $request, string $id)
    {
        $cast = DB::table('casts')->find($id);
        return view('pages.casts.edit', ['cast' => $cast]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|min:0',
            'bio' => 'required|max:3000',
            "avatar" => "image|mimes:png,jpg,jpeg",
        ]);


        $existed_cast = Cast::find( $id );

        $existed_cast->name = $validated["name"];
        $existed_cast->age = $validated["age"];
        $existed_cast->bio = $validated["bio"];

        if ($request->has('avatar')) {
            File::delete('uploads/' . $existed_cast->avatar);

            $avatar_file_name = time() . "." . $request->avatar->extension();
            $request->avatar->move(public_path("uploads"), $avatar_file_name);
            $existed_cast->avatar = $avatar_file_name;
        }

        $existed_cast->save();

        return redirect('/casts');
    }

    public function destroy(Request $request, string $id)
    {
        $cast = Cast::find($id);

        if ($cast->avatar) {
            File::delete("uploads/" . $cast->avatar);
        }
        $cast->delete();

        return redirect('/casts');
    }
}
