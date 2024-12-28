@extends('layouts.master')

@section('title')
Re:Vielm - Review and share your thoughts on films
@endsection

@section('content')
  @auth
    <section class="container mx-auto p-4 flex justify-end">
      <a href="/films/create" class="btn btn-accent">+ Add New</a>
    </section>
  @endauth
  <main class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 p-4 mx-auto gap-3">
    @foreach ($films as $f)
      <x-film-card :f="$f" />
    @endforeach
  </main>
@endsection
