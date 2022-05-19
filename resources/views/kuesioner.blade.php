@extends('layouts.main')

@section('container')
<div class="p-2">
    <div class="my-3">
      <h1 class="text-center">Pertanyaan Kuesioner</h1>
          {{-- modal --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Tambah Pertanyaan
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
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Pertanyaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="/kuesioner" method="POST" class="form">
                  @csrf
                  <div class="form-group my-2">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="" name="pertanyaan" class="form-control" id="pertanyaan" placeholder="Pertanyaan">
                  </div>
                  <div class="form-group my-2">
                    <label for="id_dimensi">Id Dimensi</label>
                    <input type="text" name="id_dimensi" class="form-control" id="id_dimensi" placeholder="Id Dimensi">
                  </div>
                  <div class="form-group my-2">
                    <label for="variabel">Variabel</label>
                    <input type="text" name="variabel" class="form-control" id="variabel" placeholder="Variabel">
                  </div>
                  <div class="form-group my-2">
                    <label for="pila">Pilihan A</label>
                    <input type="text" name="pila" class="form-control" id="pila" placeholder="Pilihan A">
                  </div>
                  <div class="form-group my-2">
                    <label for="pilb">Pilihan B</label>
                    <input type="text" name="pilb" class="form-control" id="pilb" placeholder="Pilihan B">
                  </div>
                  <div class="form-group my-2">
                    <label for="pilc">Pilihan C</label>
                    <input type="text" name="pilc" class="form-control" id="pilc" placeholder="Pilihan C">
                  </div>
                  <div class="form-group my-2">
                    <label for="pild">Pilihan D</label>
                    <input type="text" name="pild" class="form-control" id="pild" placeholder="Pilihan D">
                  </div>
                  <div class="form-group my-2">
                    <label for="pile">Pilihan E</label>
                    <input type="text" name="pile" class="form-control" id="pile" placeholder="Pilihan E">
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
            <th scope="col">No.</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">Variabel</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kuesioner as $k)
          <tr>
            <th scope="row">{{ $k['id'] }}</th>
            <td>{{ $k['pertanyaan'] }}</td>
            <td>{{ $k['variabel'] }}</td>
            <td >
              <div class="flex flex-row">
                <button type="button" class="btn btn-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><i class="bi bi-search"></i></button>
                <a href="/kuesioner/{{ $k->id }}/edit" type="button" class="btn btn-success btn-sm m-2"><i class="bi bi-pencil-square"></i></a>
                <form action="/kuesioner/{{ $k->id }}" method="POST" class="flex items-center">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm mx-1" onClick="return confirm('Yakin Hapus ?')"><i class="bi bi-trash my-2"></i></button>
                </form>
              </div>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade bolder-2" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Tambah Pertanyaan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/kuesioner" method="POST" class="form">
                    @csrf
                    <div class="form-group my-2">
                      <label for="pertanyaan">Pertanyaan</label>
                      <textarea rows="2" name="pertanyaan" class="form-control" id="pertanyaan" placeholder="Pertanyaan" disabled="true">{{  $k->pertanyaan }}</textarea>
                    </div>
                    <div class="form-group my-2">
                      <label for="id_dimensi">Id Dimensi</label>
                      <input type="text" name="id_dimensi" class="form-control" id="id_dimensi" placeholder="Id Dimensi" disabled="true" value="{{ $k->id_dimensi }}">
                    </div>
                    <div class="form-group my-2">
                      <label for="variabel">Variabel</label>
                      <input type="text" name="variabel" class="form-control" id="variabel" placeholder="Variabel" disabled="true" value="{{ $k->variabel }}">
                    </div>
                    <div class="form-group my-2">
                      <label for="pila">Pilihan A</label>
                      <input type="text" name="pila" class="form-control" id="pila" placeholder="Pilihan A" disabled="true" value="{{ $k->pila }}">
                    </div>
                    <div class="form-group my-2">
                      <label for="pilb">Pilihan B</label>
                      <input type="text" name="pilb" class="form-control" id="pilb" placeholder="Pilihan B" disabled="true" value="{{ $k->pilb }}">
                    </div>
                    <div class="form-group my-2">
                      <label for="pilc">Pilihan C</label>
                      <input type="text" name="pilc" class="form-control" id="pilc" placeholder="Pilihan C" disabled="true" value="{{ $k->pilc }}">
                    </div>
                    <div class="form-group my-2">
                      <label for="pild">Pilihan D</label>
                      <input type="text" name="pild" class="form-control" id="pild" placeholder="Pilihan D" disabled="true" value="{{ $k->pild }}">
                    </div>
                    <div class="form-group my-2">
                      <label for="pile">Pilihan E</label>
                      <input type="text" name="pile" class="form-control" id="pile" placeholder="Pilihan E" disabled="true" value="{{ $k->pile }}">
                    </div>
                    <div class="my-4">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        {{-- modal --}}
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection