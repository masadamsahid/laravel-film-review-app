<div class="bg-base-300/70 fixed top-0 w-full z-50">
  <div class="navbar container mx-auto">
    <div class="flex-1">
      <a href="/" class="btn btn-ghost text-xl">Re:vielm</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li><a href="/casts">Casts</a></li>
        <li><a href="/genres">Genres</a></li>
        <li>
          <details>
            <summary>
              @auth
              <p>Hello, <span class="text-accent">{{ Auth::user()->name }}</span></p>
              @else
              Account
              @endauth
            </summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              @auth
                <li class="p-0">
                  <form action="/logout" method="POST" class="p-0 w-full flex">
                    @csrf
                    <button type="submit" class="btn btn-error btn-sm w-full">Logout</button>
                  </form>
                </li>
              @else
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>
              @endauth
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>
</div>
