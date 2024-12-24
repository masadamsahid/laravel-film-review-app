@extends('layouts.master')

@section('title')
  Login
@endsection

@section('content')
  <main class="container min-h-screen flex justify-center items-center mx-auto">
    <div class="card lg:card-side bg-base-100 shadow-xl lg:min-w-[70%] lg:min-h-[70vh]">
      <figure class="lg:w-[30%]">
        <img class="w-full h-full" src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp" alt="Album" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Login</h2>
        @if ($errors->any())
          <div class="alert alert-error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
          @csrf
          <div class="flex flex-col gap-2">
            <label for="email" class="block">Email</label>
            <input id="email" name="email" type="email" placeholder="Type here" class="input input-bordered input-accent w-full" />
          </div>
          <div class="flex flex-col gap-2">
            <label for="password" class="block">Password</label>
            <input id="password" name="password" type="password" placeholder="Type here" class="input input-bordered input-accent w-full" />
          </div>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Login</button>
          </div>
        </form>
        <div class="mt-auto text-center">
          <p>Don't have account yet? <a href="/register" class="link link-primary">Register</a></p>
        </div>
      </div>
    </div>
  </main>
@endsection
