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
        <h2 class="card-title">Register</h2>
        @if ($errors->any())
          <div class="alert alert-error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
          @csrf
          <div class="flex flex-col gap-2">
            <label for="name" class="block">Name</label>
            <input id="name" name="name" type="text" placeholder="Type here" class="input input-bordered input-accent w-full" />
          </div>
          <div class="flex flex-col gap-2">
            <label for="email" class="block">Email</label>
            <input id="email" name="email" type="email" placeholder="Type here" class="input input-bordered input-accent w-full" />
          </div>
          <div class="flex flex-col gap-2">
            <label for="password" class="block">Password</label>
            <input id="password" name="password" type="password" placeholder="Type here" class="input input-bordered input-accent w-full" />
          </div>
          <div class="flex flex-col gap-2">
            <label for="password-confirm" class="block">Confirm Password</label>
            <input id="password-confirm" name="password_confirmation" type="password" placeholder="Type here" class="input input-bordered input-accent w-full" />
          </div>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Register</button>
          </div>
        </form>
        <div class="mt-auto text-center">
          <p class="">Already registered? <a href="/login" class="link link-primary">Login</a></p>
        </div>
      </div>
    </div>
  </main>
@endsection
