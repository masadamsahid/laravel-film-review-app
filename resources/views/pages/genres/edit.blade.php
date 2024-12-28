@extends('layouts.master')

@section('title')
  Edit {{$genre->name}}
@endsection

@section('content')
  <div class="container mx-auto p-4 flex">
    <a href="/genres/{{ $genre->id }}" class="btn btn-accent">&larr; Back</a>
  </div>
  <section class="container mx-auto p-4 flex flex-col gap-4">
    <h1>Edit Genre ({{ $genre->name }})</h1>
    @if ($errors->any())
      <div class="alert alert-error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="/genres/{{ $genre->id }}" method="POST" class="flex flex-col gap-4">
      @csrf
      @method('PUT')
      <div class="flex flex-col gap-2">
        <label for="name" class="block">Name</label>
        <input
          id="name"
          name="name"
          type="text"
          placeholder="Type here"
          class="input input-bordered input-accent w-full"
          value="{{ old('name') ? old('name') :  $genre->name }}"
        />
      </div>
      <div class="flex flex-col gap-2">
        <label for="desc" class="block">Desc</label>
        <textarea
          id="desc"
          name="desc"
          rows="10"
          class="textarea textarea-accent"
          placeholder="Description"
        >{{ old('desc') ? old('desc') : $genre->desc }}</textarea>
      </div>
      <button type="submit" class="btn btn-accent">
        CREATE
      </button>
    </form>
  </section>
@endsection
