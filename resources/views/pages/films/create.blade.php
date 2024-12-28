@extends('layouts.master')

@section('title')
  Add New Film
@endsection

@section('content')
  <div class="container mx-auto p-4 flex">
    <a href="/films" class="btn btn-accent">&larr; Back</a>
  </div>
  <section class="container mx-auto p-4 flex flex-col gap-4">
    <h1>Add New Film</h1>
    @if ($errors->any())
      <div class="alert alert-error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="/films" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
      @csrf
      <div class="flex flex-col gap-2">
        <label for="title" class="block">Title</label>
        <input id="title" name="title" type="text" placeholder="Type here" value="{{ old('title') }}" class="input input-bordered input-accent w-full" />
      </div>
      <div class="flex gap-4">
        <div class="flex-1 flex flex-col gap-2">
          <label for="year" class="block">Year</label>
          <input id="year" name="year" type="number" step="1" placeholder="Year Released" value="{{ old('year') }}" class="input input-bordered input-accent w-full" />
        </div>
        <div class="flex-1 flex flex-col gap-2">
          <label for="genre_id" class="block">Genre</label>
          <select id="genre_id" name="genre_id" class="select select-accent w-full">
            <option disabled {{ old('genre_id') ? null : "selected"  }}>Select a genre</option>
            @foreach ($genres as $g)
              <option value="{{ $g->id }}" {{ old('genre_id') == $g->id ? "selected" : null  }} >{{ $g->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="flex flex-col gap-2">
        <label for="poster" class="block">Poster</label>
        <input id="poster" name="poster" type="file" placeholder="Type here" value="{{ old('poster') }}" class="file-input file-input-bordered file-input-accent w-full" />
      </div>
      <div class="flex flex-col gap-2">
        <label for="summary" class="block">Summary</label>
        <textarea id="summary" name="summary" rows="10" class="textarea textarea-accent" placeholder="About this film ...">{{ old('summary') }}</textarea>
      </div>
      <button type="submit" class="btn btn-accent">
        ADD NEW
      </button>
    </form>
  </section>
@endsection
