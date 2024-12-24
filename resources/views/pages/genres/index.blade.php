@extends('layouts.master')

@section('content')
  @auth
    <section class="container mx-auto p-4 flex justify-end">
      <a href="/genres/create" class="btn btn-accent">+ Add New</a>
    </section>
  @endauth
  <main class="container flex flex-wrap p-4 mx-auto gap-3">
    @foreach ($genres as $g)
      <a href="/genres/{{ $g->id }}" class="py-4 px-6 badge badge-lg badge-primary badge-outline hover:bg-primary hover:text-white">
        {{ $g->name }}
      </a>
    @endforeach
  </main>
@endsection
