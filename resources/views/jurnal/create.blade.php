@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jurnal</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/jurnal" method="post" class="form-group">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" class="form-control @error('nama')
                    is-invalid
                @enderror" id="nama">
                @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" class="form-control @error('tanggal')
                is-invalid
            @enderror" id="nama">
            @error('tanggal')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb3">
                <label for="" class="form-label">Status</label>
                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="status">
                    <option value="selesai">Selesai</option>
                    <option value="tertunda">Tertunda</option>
                  </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </form>
    </div>
</div>
@endsection
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jurnal</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/jurnal" method="post" class="form-group">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" class="form-control" id="nama">
            </div>
            <div class="mb3">
                <label for="" class="form-label">Status</label>
                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="status">
                    <option value="selesai">Selesai</option>
                    <option value="tertunda">Tertunda</option>
                  </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </form>
    </div>
</div>
@endsection