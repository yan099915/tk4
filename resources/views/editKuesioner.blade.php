@extends('layouts.main')
{{-- @dd($dimensi) --}}

@section('container')
<div class="p-2">
  <div class="my-3">
    <h1 class="text-center">Edit Pertanyaan</h1>
    <form action="/kuesioner/update" method="POST" class="form">
      @method('put')
      @csrf
      <div class="form-group">
        <input type="text" name="id" class="form-control" id="id" hidden="true" value="{{ old('id', $kues->id) }}">
      </div>
      <div class="form-group my-2">
        <label for="pertanyaan">Pertanyaan</label>
        <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" placeholder="Pertanyaan" value="{{ $kues->pertanyaan }}">
      </div>
      <div class="form-group my-2">
        <label for="id_dimensi">Id Dimensi</label>
        <input type="text" name="id_dimensi" class="form-control" id="id_dimensi" placeholder="Id Dimensi" value="{{ old('id_dimensi', $kues->id_dimensi) }}">
      </div>
      <div class="form-group my-2">
        <label for="variabel">Variabel</label>
        <input type="text" name="variabel" class="form-control" id="variabel" placeholder="Variabel" value="{{ old('variabel', $kues->variabel) }}">
      </div>
      <div class="form-group my-2">
        <label for="pila">Pilihan A</label>
        <input type="text" name="pila" class="form-control" id="pila" placeholder="Pilihan A" value="{{ old('pila', $kues->pila) }}">
      </div>
      <div class="form-group my-2">
        <label for="pilb">Pilihan B</label>
        <input type="text" name="pilb" class="form-control" id="pilb" placeholder="Pilihan B" value="{{ old('pilb', $kues->pilb) }}">
      </div>
      <div class="form-group my-2">
        <label for="pilc">Pilihan C</label>
        <input type="text" name="pilc" class="form-control" id="pilc" placeholder="Pilihan C" value="{{ old('pilc', $kues->pilc) }}">
      </div>
      <div class="form-group my-2">
        <label for="pild">Pilihan D</label>
        <input type="text" name="pild" class="form-control" id="pild" placeholder="Pilihan E" value="{{ old('bobot', $kues->pild) }}">
      </div>
      <div class="form-group my-2">
        <label for="pile">Pilihan E</label>
        <input type="text" name="pile" class="form-control" id="pile" placeholder="Pilihan D" value="{{ old('bobot', $kues->pile) }}">
      </div>
      <div class="my-4">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
      </div>
    </form>
@endsection