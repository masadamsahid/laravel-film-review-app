@extends('layouts.master')

@section('content')
  <section class="container mx-auto p-4 flex justify-end">
    <a href="/films/create" class="btn btn-accent">+ Add New</a>
  </section>
  <main class="container grid grid-cols-5 p-4 mx-auto gap-3">
    @foreach ($films as $f)
      <a href="/films/{{ $f->id }}" class="card bg-base-100 shadow-xl">
        <figure>
          <img src="{{ asset('uploads/'.$f->poster) }}" alt="Shoes" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">
            {{ $f->title }}
            <span class="badge badge-accent">{{ $f->year }}</span>
          </h2>
          {{-- <div class="card-actions justify-end">
            <button class="btn btn-primary">Buy Now</button>
          </div> --}}
        </div>
      </a>
    @endforeach
  </main>
@endsection
