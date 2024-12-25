@php
  function is_user_id_exists($id, $arr)
  {
      $is_exists = false;
      foreach ($arr as $item) {
          if ($item->user_id === $id) {
              $is_exists = true;
              break;
          }
      }
      return $is_exists;
  }
  $user = Auth::user();
@endphp

@extends('layouts.master')

@section('title')
  Edit {{ $film->title }}
@endsection

@section('content')
  <div class="flex flex-col gap-4">
    @auth
      <section class="container mx-auto p-4 flex justify-end gap-4">
        <a href="/films/{{ $film->id }}/edit" class="btn btn-accent">Edit</a>
        <form action="/films/{{ $film->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline btn-error">Delete</button>
        </form>
      </section>
    @endauth
    <main class="container flex p-4 mx-auto gap-4 border border-accent rounded-md">
      <figure class="max-w-60 max-h-96">
        <img src="{{ asset('uploads/' . $film->poster) }}" alt="" srcset="">
      </figure>
      <div class="flex flex-col gap-3">
        <h1 class="text-6xl font-bold">
          {{ $film->title }}
        </h1>
        <div class="flex gap-2 items-center">
          <p>Released on {{ $film->year }}</p>
          &bull;
          <div class="badge badge-lg badge-accent">{{ $film->genre->name }}</div>
        </div>
        <article class="">
          {{ $film->summary }}
        </article>
      </div>
    </main>

    <section class="container p-4 mx-auto flex flex-col gap-4">
      <h3 class="text-2xl fw-semibold">Reviews</h3>
      @auth
        @if (!is_user_id_exists($user->id, $film->reviews))
          <form action="/films/{{ $film->id }}/reviews" method="POST" class="flex flex-col gap-2 mb-4">
            @if ($errors->any())
              <div class="alert alert-error">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @csrf
            <textarea name="body" class="textarea textarea-accent" placeholder="Write a review here..."></textarea>
            <div class="flex gap-2">
              <p>Points:</p>
              <div class="flex gap-2 flex-wrap">
                @for ($i = 0; $i <= 10; $i++)
                  <label for="points-{{ $i }}" class="btn btn-accent btn-outline">
                    <input type="radio" id="points-{{ $i }}" name="points" value="{{ $i }}" class="radio radio-accent" />
                    <p class="">
                      {{ $i }}
                    </p>
                  </label>
                @endfor
              </div>
            </div>
            <div class="flex gap-2 justify-end">
              <button type="reset" class="btn btn-error btn-outline">Cancel</button>
              <button type="submit" class="btn btn-accent">Post Review</button>
            </div>
          </form>
        @endif
      @endauth

      {{-- Reviews --}}
      <div class="flex flex-col gap-4">
        @foreach ($film->reviews as $r)
          <div class="flex gap-4 w-full relative group">
            @if ($user->id === $r->user_id)
              <div class="z-20 absolute top-0 right-0 hidden group-hover:flex gap-2">
                <a href="/reviews/{{ $r->id }}/edit" class="btn btn-sm btn-accent">
                  Edit
                </a>
                <button href="/reviews/{{ $r->id }}/edit" class="btn btn-sm btn-error">
                  Delete
                </button>
              </div>
            @endif
            <div>
              <div class="avatar">
                <div class="size-12 rounded-full">
                  <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
              </div>
            </div>
            <div class="flex-1 flex flex-col gap-2">
              <h2 class="card-title">
                {{ $r->user->name }} &bull; <span class="text-accent fw-bold"><span class="underline">{{ $r->points }}/10</span> &#x2605;</span>
              </h2>
              <div class="card card-side bg-base-100 shadow-xl">
                <p class="card-body border border-accent rounded-md">
                  {{ $r->body }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    {{-- 
    <section class="container p-4 mx-auto border border-accent rounded-md">
      <p>Ini nanti isinya beberapa film random</p>
    </section>
    --}}
  </div>
@endsection
