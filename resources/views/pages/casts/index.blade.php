@extends('layouts.master')

@section('title')
  Cast List
@endsection

@push('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
@endpush

@push('scripts')
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <script>
    $(function() {
      $("#cast-list").DataTable();
    });
  </script>


  {{-- <script>
    function getToken() {
      let metas = document.getElementsByTagName("meta");
      for (let i = 0; i < metas.length; i++) {
        let meta = metas[i];
        if (meta.name === "csrf-token") {
          return meta.content;
        }
      }
    }

    function confirmDelete(id, name) {
      if (confirm(`Are you sure to delete ${name} with ID of ${id}?`)) fetch(`/api/casts/${id}`, {
        method: 'DELETE',
        headers: {
          "X-CSRF-Token": getToken(),
        },
      });
    }

    const btns = document.getElementsByClassName('delete-cast-btn');
    console.log(btns);

    for (const btn of btns) {
      btn.addEventListener('click', () => {
        let [id, name] = btn.getAttribute("data-value").split(",");
        id = Number(id);
        confirmDelete(id, name);
        console.log(`Success ${id}`);
      });
    }
  </script> --}}
@endpush

@section('content')
  <div class="mb-4 d-flex justify-content-end align-items-center">
    <a href="/casts/create" class="btn btn-primary d-flex justify-center align-items-center" style="width: fit-content; gap: .8rem">
      <i class="fas fa-plus"></i>
      Add New Cast
    </a>
  </div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cast List</h3>
    </div>
    <div class="card-body">
      <table id="cast-list" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Added at</th>
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($casts as $cast)
            <tr>
              <td>{{ $cast->id }}</td>
              <td>{{ $cast->name }}</td>
              <td>{{ $cast->age }}</td>
              <td>{{ $cast->created_at }}</td>
              <td>{{ $cast->updated_at }}</td>
              <td>
                <div class="d-flex" style="gap: .8rem;">
                  <a href="{{ route('casts.show', $cast->id) }}" title="View {{ $cast->name }}'s details" class="btn btn-info">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="/casts/{{ $cast->id }}/edit" title="Edit {{ $cast->name }}'s details" class="btn btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form method="POST" action="/casts/{{ $cast->id }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" title="Delete {{ $cast->name }}?" class="btn btn-danger delete-cast-btn" data-value="{{ $cast->id . ',' . $cast->name }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Added at</th>
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection
