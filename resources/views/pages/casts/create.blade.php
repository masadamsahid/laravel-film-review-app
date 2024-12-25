@extends('layouts.master')

@section('title')
  Create New Cast
@endsection

@section('content')
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
      <h3 class="card-title">Create a New Cast</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('casts.store') }}">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
          </div>
          <div class="form-group col-6">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" step="1" placeholder="Age" value="{{ old('age') }}">
          </div>
        </div>

        <div class="form-group">
          <label for="bio">Bio</label>
          <textarea class="form-control" id="bio" name="bio" rows="8" placeholder="Bio...">{{ old('bio') }}</textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
