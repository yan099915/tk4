@extends('layouts.main')
{{-- @dd($dimensi) --}}
@section('container')
<div class="p-2">
  <div class="my-3">
    <h1 class="text-center">Dimensi</h1>
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
              <form action="/dimensi" method="POST" class="form">
                @csrf
                <div class="form-group my-2">
                  <label for="dimensi">Dimensi</label>
                  <input type="text" name="dimensi" class="form-control" id="dimensi" placeholder="Dimensi">
                </div>
                <div class="form-group my-2">
                  <label for="bobot">Bobot</label>
                  <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Dimensi">
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
  <div class="border rounded p-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Dimensi</th>
          <th scope="col">Bobot</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dimensi as $dim)
        <tr>
          <th scope="row">{{ $dim['id'] }}</th>
          <td>{{ $dim['dimensi'] }}</td>
          <td>{{ $dim['bobot'] }}</td>
          <td>

            <a href="/dimensi/{{ $dim->id }}/edit" type="button" class="btn btn-success btn-sm mx-1"><i class="bi bi-pencil-square"></i></a>
            <form action="/dimensi/{{ $dim->id }}" method="POST" class="d-inline">
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