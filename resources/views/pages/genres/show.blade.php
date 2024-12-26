@extends('layouts.master')

@section('content')
  <div class="flex flex-col gap-4">
    @auth
      <section class="container mx-auto p-4 flex justify-end gap-4">
        <a href="/genres/{{ $genre->id }}/edit" class="btn btn-accent">Edit</a>
        <form action="/genres/{{ $genre->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline btn-error">Delete</button>
        </form>
      </section>
    @endauth
    <main class="container flex flex-col p-4 mx-auto gap-4 border border-accent rounded-md">
      <h1 class="text-6xl font-bold">
        {{ $genre->name }}
      </h1>
      <article class="">
        {{ $genre->desc }}
      </article>
    </main>
    <section class="container p-4 mx-auto border border-accent rounded-md grid grid-cols-5 gap-3">
      @foreach ($films as $f)
        <x-film-card :f="$f" />
      @endforeach
    </section>
  </div>
@endsection
