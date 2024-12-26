@extends('layouts.master')

@section('content')
  @auth
    <section class="container mx-auto p-4 flex justify-end">
      <a href="/films/create" class="btn btn-accent">+ Add New</a>
    </section>
  @endauth
  <main class="container grid grid-cols-5 p-4 mx-auto gap-3">
    @foreach ($films as $f)
      <x-film-card :f="$f" />
    @endforeach
  </main>
@endsection
