@extends('layouts.main')
{{-- @dd($dimensi) --}}

@section('container')
<div class="p-2">
  <div class="my-3">
    <h1 class="text-center">Edit Dimensi</h1>
    <form action="/pengguna/update" method="POST" class="form">
      @method('put')
      @csrf
      <div class="form-group">
        <input type="text" name="id" class="form-control" id="id" hidden="true" value="{{ old('id', $peng->id) }}">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" hidden="true" value="{{ old('password', $peng->password) }}">
      </div>
      <div class="form-group my-2">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ $peng->username }}">
      </div>
      <div class="form-group">
        <label for="hak_akses">Hak Akses</label>
        <input type="text" name="hak_akses" class="form-control" id="bohak_aksesbot" placeholder="Hak Akses" value={{ old('hak_akses', $peng->hak_akses) }}>
      </div>
      <div class="my-4">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
      </div>
    </form>
@endsection