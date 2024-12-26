<a href="/films/{{ $f->id }}" class="card bg-base-100 shadow-xl group overflow-hidden relative h-96">
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
