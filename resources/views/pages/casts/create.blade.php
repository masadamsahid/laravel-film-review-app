@extends('layouts.master')

@section('title')
  Create New Cast
@endsection

@section('content')
  <div class="container mx-auto">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="card">
      <div class="card-body">
        <h3 class="card-title mb-4 text-3xl">Create a New Cast</h3>
        <form method="POST" action="{{ route('casts.store') }}" enctype="multipart/form-data" class="flex flex-col gap-4">
          @csrf
          <div class="flex gap-2 w-full">
            <label class="flex-1 input input-bordered input-accent flex items-center gap-2">
              <span class="badge badge-lg badge-accent rounded-md">
                Name
              </span>
              <input type="text" id="name" name="name" placeholder="Cyberpunk Beaver" value="{{ old('name') }}" class="w-full">
            </label>
            <label class="flex-1 input input-bordered input-accent flex items-center gap-2">
              <span class="badge badge-lg badge-accent rounded-md">
                Age
              </span>
              <input type="number" id="age" name="age" step="1" placeholder="2077" value="{{ old('age') }}" class="w-full">
            </label>
          </div>

          <div class="flex flex-col gap-2">
            <label for="avatar" class="block">Avatar</label>
            <input id="avatar" name="avatar" type="file" placeholder="Type here" value="{{ old('avatar') }}" class="file-input file-input-bordered file-input-accent w-full" />
          </div>

          <div class="flex flex-col gap-2">
            <label for="bio">Bio</label>
            <textarea class="textarea textarea-accent" id="bio" name="bio" rows="8" placeholder="A hi-tech cyborg beaver ...">{{ old('bio') }}</textarea>
          </div>
          <button type="submit" class="btn btn-accent">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
