@php
  $user = Auth::user();

  if (!function_exists('is_user_id_exists')) {
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
  }

  if (!function_exists('get_rating_avg')) {
      function get_rating_avg($film)
      {
          $length = count($film->reviews);
          if ($length < 1) {
              return 0;
          }
          $sum = 0;
          foreach ($film->reviews as $r) {
              $sum += $r->points;
          }
          return $sum / $length;
      }
  }

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
      <figure class="max-w-60 max-h-96 relative">
        <span class="badge badge-lg badge-accent my-auto absolute translate-x-1/2 -translate-y-1/2 top-0 right-0">
          &#x2605; {{ count($film->reviews) < 1 ? 'N/A' : get_rating_avg($film) }}
        </span>
        <img src="{{ asset('uploads/' . $film->poster) }}" alt="" srcset="">
      </figure>
      <div class="flex-1 flex flex-col gap-3">
        <h1 class="text-6xl font-bold">
          {{ $film->title }}
        </h1>
        <p>Added on {{ date_format($film->created_at, 'd, M Y') }} {{ $film->updated_at > $film->created_at ?? '(updated at ' . date_format($film->updated_at, 'd, M Y') . ')' }}</p>
        <div class="flex gap-2 items-center">
          <p>Released on {{ $film->year }}</p>
          &bull;
          <div class="badge badge-lg badge-accent">{{ $film->genre->name }}</div>
        </div>
        <div>
          <p>Summary:</p>
          <article class="">
            {{ $film->summary }}
          </article>
        </div>
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

      <hr>

      {{-- Reviews --}}
      @if (count($film->reviews) > 1)
        <div class="flex flex-col gap-4">
          @foreach ($film->reviews as $r)
            <div class="flex gap-4 w-full relative group">
              @if ($user != null && $user->id === $r->user_id)
                <div class="z-20 absolute top-0 right-0 hidden group-hover:flex gap-2">
                  <button onclick="edit_review_modal_{{ $r->id }}.showModal()" class="btn btn-sm btn-accent">
                    Edit
                  </button>
                  <dialog id="edit_review_modal_{{ $r->id }}" class="modal">
                    <div class="modal-box">
                      <h3 class="text-lg font-bold">Edit Your Review</h3>
                      <p class="py-4">Press ESC key or click outside to close</p>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                      <button>close</button>
                    </form>
                  </dialog>
                  <button href="/reviews/{{ $r->id }}/edit" class="btn btn-sm btn-error">
                    Delete
                  </button>
                </div>
              @endif
              <div>
                <div class="avatar">
                  <div class="size-16 mask mask-hexagon bg-accent !flex justify-center items-center">
                    <span class="text-xl font-semibold text-black">
                      {{ strtoupper(join('',array_map(function ($str) {return $str[0];}, explode(' ', $r->user->name)))) }}
                    </span>
                    {{-- <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" /> --}}
                  </div>
                </div>
              </div>
              <div class="flex-1 flex flex-col gap-2">
                <div class="flex gap-2 items-center">
                  <h2 class="card-title">
                    {{ $r->user->name }}
                  </h2>
                  &bull;
                  <p class="text-warning italic">
                    {{ $r->updated_at > $r->created_at ? 'last update at ' . date_format($r->updated_at, 'd, M Y') : 'written at ' . date_format($r->created_at, 'd, M Y') }}
                  </p>
                </div>
                <div class="card card-side bg-base-100 shadow-xl relative overflow-hidden border border-accent rounded-md">
                  <p class="card-body">
                    {{ $r->body }}
                  </p>
                  <span class="px-2 py-1 rounded-tl-lg badge-accent fw-bold text-md absolute bottom-0 right-0 z-30">
                    &#x2605; <span>{{ $r->points }}/10</span>
                  </span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="card">
          <div class="card-body text-center bg-black/20">
            <p class="italic">~ No reviews for this film yet ~</p>
          </div>
        </div>
      @endif
    </section>

    {{-- 
    <section class="container p-4 mx-auto border border-accent rounded-md">
      <p>Ini nanti isinya beberapa film random</p>
    </section>
    --}}
  </div>
@endsection
