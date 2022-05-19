@extends('layouts.main')

@section('container')
<div class="p-2">
    <div class="my-3">
      <h1 class="text-center">Pengguna</h1>
          {{-- modal --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Tambah Dimensi
      {{-- Alert --}}
    </button>
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Dimensi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/pengguna" method="POST" class="form">
              @csrf
              <div class="form-group my-2">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
              </div>
              <div class="form-group my-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-group my-2">
                <label for="hak_akses">Hak Akses</label>
                <input type="text" name="hak_akses" class="form-control" id="hak_akses" placeholder="Hak Akses">
              </div>
              <div class="my-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  {{-- modal --}}
    </div>
    <div class="border rounded p-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Hak Akses</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pengguna as $p)
          <tr>
            <th scope="row">{{ $p['id'] }}</th>
            <td>{{ $p['username'] }}</td>
            <td>{{ $p['hak_akses'] }}</td>
            <td>
              <a href="/pengguna/{{ $p->id }}/edit" type="button" class="btn btn-success btn-sm mx-1"><i class="bi bi-pencil-square"></i></a>
              <form action="/pengguna/{{ $p->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm mx-1" onClick="return confirm('Yakin Hapus ?')"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection