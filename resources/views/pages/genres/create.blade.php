@extends('layouts.master')

@section('title')
  Add New Genre
@endsection

@section('content')
  <div class="container mx-auto p-4 flex">
    <a href="/genres" class="btn btn-accent">&larr; Back</a>
  </div>
  <section class="container mx-auto p-4 flex flex-col gap-4">
    <h1>Create a New Genre</h1>
    <form action="/genres" method="POST" class="flex flex-col gap-4">
      @csrf
      <div class="flex flex-col gap-2">
        <label for="name" class="block">Name</label>
        <input id="name" name="name" type="text" placeholder="Type here" class="input input-bordered input-accent w-full" />
      </div>
      <div class="flex flex-col gap-2">
        <label for="desc" class="block">Desc</label>
        <textarea
          id="desc"
          name="desc"
          rows="10"
          class="textarea textarea-accent"
          placeholder="Description"
        ></textarea>
      </div>
      <button type="submit" class="btn btn-accent">
        CREATE
      </button>
    </form>
  </section>
@endsection
