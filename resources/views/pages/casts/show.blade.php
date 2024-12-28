@extends('layouts.master')

@section('title')
  {{ $cast->name }} | Cast Detail
@endsection

@section('content')
  <div class="container mx-auto flex flex-col gap-4">
    <div class="flex">
      <a href="/casts" class="btn btn-success">
        Back
      </a>
      @auth
        <div class="ms-auto p-0 flex align-items-center" style="gap: .8rem">
          <a href="/casts/{{ $cast->id }}/edit" class="btn btn-warning">Edit</a>
          <form method="POST" action="/casts/{{ $cast->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error">Delete</button>
          </form>
        </div>
      @endauth
    </div>
    <main class="flex gap-4">
      <div class="avatar">
        <div class="mask mask-squircle w-72">
          <img src="{{ asset('uploads/' . $cast->avatar) }}" />
        </div>
      </div>
      <div class="flex-1">
        <h2 class="text-6xl font-bold">{{ $cast->name }}</h2>
        <div class="p-4">
          <table class="w-full">
            <tbody>
              <tr>
                <td class="w-24 align-top">Age</td>
                <td class="w-4 align-top">:</td>
                <td>{{ $cast->age }} years old</td>
              </tr>
              <tr>
                <td class="align-top">Bio</td>
                <td class="align-top">:</td>
                <td>{{ $cast->bio }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
@endsection
