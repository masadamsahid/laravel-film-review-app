@extends('layouts.master')

@section('content')
  @auth
    <section class="container mx-auto p-4 flex justify-end">
      <a href="/genres/create" class="btn btn-accent">+ Add New</a>
    </section>
  @endauth
  <main class="container flex flex-col flex-wrap p-4 mx-auto gap-12">
    @foreach ($genres as $alphanum_group => $g_arr)
      <div class="flex flex-col gap-4">
        <h2 class="text-4xl font-bold">{{ $alphanum_group }}</h2>
        <hr>
        <div class="flex flex-wrap gap-4">
          @foreach ($g_arr as $g)
            <a href="/genres/{{ $g->id }}" class="py-4 px-6 badge badge-lg badge-primary badge-outline hover:bg-primary hover:text-white">
              {{ $g->name }}
            </a>
          @endforeach
        </div>
      </div>
    @endforeach
  </main>
@endsection
