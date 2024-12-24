@extends('layouts.master')

@section('title')
  Edit {{ $film->title }}
@endsection

@section('content')
  <div class="flex flex-col gap-4">
    <section class="container mx-auto p-4 flex justify-end gap-4">
      <a href="/films/{{ $film->id }}/edit" class="btn btn-accent">Edit</a>
      <form action="/films/{{ $film->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-outline btn-error">Delete</button>
      </form>
    </section>
    <main class="container flex flex-col p-4 mx-auto gap-4 border border-accent rounded-md">
      <h1 class="text-6xl font-bold">
        {{ $film->title }}
      </h1>
      <article class="">
        {{ $film->summary }}
      </article>
    </main>
    <section class="container p-4 mx-auto border border-accent rounded-md">
      <p>Ini nanti isinya beberapa film random</p>
    </section>
  </div>
@endsection
