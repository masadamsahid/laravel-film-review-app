<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $cast_data = [
            'name' => $request->input('name'),
            'age' => (int) $request->input('age'),
            'bio' => $request->input('bio'),
        ];

        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|min:0',
            'bio' => 'required|max:3000',
        ]);

        DB::table('casts')->insert([
            'name' => $request['name'],
            'age' => $request['age'],
            'bio' => $request['bio'],
        ]);

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
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|min:0',
            'bio' => 'required|max:3000',
        ]);

        DB::table('casts')->where('id', $id)->update([
            'name' => $request['name'],
            'age' => $request['age'],
            'bio' => $request['bio'],
        ]);

        return redirect('/casts');
    }

    public function destroy(Request $request, string $id)
    {
        DB::table('casts')->where('id', $id)->delete();
        return redirect('/casts');
    }
}
