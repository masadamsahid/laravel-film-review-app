@extends('layouts.master')

@section('title')
  {{ $cast->name }} | Cast Detail
@endsection

@section('content')
  <div class="d-flex" style="gap: .8rem">
    <a href="/casts" class="btn btn-success mb-4 d-flex justify-center align-items-center" style="width: fit-content; gap: .8rem">
      <i class="fas fa-list-alt"></i>
      Cast List
    </a>
  </div>
  <div class="p-0 d-flex align-items-center" style="gap: .8rem">
    <h2 class="font-weight-bolder m-0">{{ $cast->name }}</h2>
    <a href="/casts/{{ $cast->id }}/edit" class="p-0 btn btn-link text-warning">Edit</a>
    <form method="POST" action="/casts/{{ $cast->id }}">
      @csrf
      @method("DELETE")
      <button type="submit" class="p-0 btn btn-link text-danger">Delete</button>
    </form>
  </div>
  <hr>
  <div>
    <p>Age: {{ $cast->age }}</p>
    <p>Bio:</p>
    <blockquote>{{ $cast->bio }}</blockquote>
  </div>
@endsection
