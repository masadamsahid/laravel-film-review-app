<div class="relative group">
  <a href="/films/{{ $f->id }}" class="card bg-base-100 shadow-xl overflow-hidden relative h-[480px]">
    <figure class="size-full">
      <img src="{{ asset('uploads/' . $f->poster) }}" alt="{{ $f->title }}" class="min-h-full min-w-full object-cover" />
    </figure>
    <div class="card-body absolute -bottom-full group-hover:bottom-0 size-full z-10 bg-gradient-to-t from-black/80 flex flex-col justify-end transition-all duration-200">
      <h2 class="card-title">
        {{ $f->title }}
      </h2>
      <div class="flex flex-wrap gap-2">
        <span class="badge badge-accent">{{ $f->year }}</span>
        <span class="badge badge-primary">{{ $f->genre->name }}</span>
      </div>
      {{-- <div class="card-actions justify-end">
        <button class="btn btn-primary">Buy Now</button>
      </div> --}}
    </div>
  </a>
  @auth
    <div class="p-2 absolute top-0 right-0 flex flex-col gap-2 justify-center items-center translate-x-1/2 -translate-y-1/2 scale-0 group-hover:scale-100 opacity-0 group-hover:opacity-100 z-40 bg-white rounded-xl duration-200 transition-all">
      <div class="tooltip tooltip-right tooltip-warning" data-tip="Edit">
        <a href="/films/{{ $f->id }}/edit" class="p-1 btn btn-sm btn-accent">✏</a>
      </div>
      <form action="/films/{{ $f->id }}" method="POST" class="tooltip tooltip-right tooltip-error" data-tip="Delete?">
        @csrf
        @method('DELETE')
        <button type="submit" class="p-1 btn btn-sm  btn-error">🧺</button>
      </form>
    </div>
  @endauth
</div>
