@extends('layouts.master')

@section('title')
  Edit {{ $cast->name }}
@endsection

@section('content')
  <div class="d-flex" style="gap: .8rem">
    <a href="/casts" class="btn btn-success mb-4 d-flex justify-center align-items-center" style="width: fit-content; gap: .8rem">
      <i class="fas fa-list-alt"></i>
      Cast List
    </a>
    <a href="/casts/{{ $cast->id }}" class="btn btn-warning mb-4 d-flex justify-center align-items-center" style="width: fit-content; gap: .8rem">
      <i class="fas fa-arrow-left"></i>
      Back
    </a>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit {{ $cast->name }}'s Details</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('casts.update', $cast->id) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ? old('name') : $cast->name }}">
          </div>
          <div class="form-group col-6">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" step="1" placeholder="Age" value="{{ old('age') ? old('age') : $cast->age }}">
          </div>
        </div>

        <div class="form-group">
          <label for="bio">Bio</label>
          <textarea class="form-control" id="bio" name="bio" rows="8" placeholder="Bio...">{{ old('bio') ? old('bio') : $cast->bio }}</textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
