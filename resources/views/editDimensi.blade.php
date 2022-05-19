@extends('layouts.main')
{{-- @dd($dimensi) --}}

@section('container')
<div class="p-2">
  <div class="my-3">
    <h1 class="text-center">Edit Dimensi</h1>
    <form action="/dimensi/update" method="POST" class="form">
      @method('put')
      @csrf
      <div class="form-group">
        <input type="text" name="id" class="form-control" id="id" hidden="true" value="{{ old('id', $dims->id) }}">
      </div>
      <div class="form-group my-2">
        <label for="dimensi">Dimensi</label>
        <input type="text" name="dimensi" class="form-control" id="dimensi" placeholder="Dimensi" value="{{ $dims->dimensi }}">
      </div>
      <div class="form-group">
        <label for="bobot">Bobot</label>
        <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Dimensi" value={{ old('bobot', $dims->bobot) }}>
      </div>
      <div class="my-4">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
      </div>
    </form>
@endsection