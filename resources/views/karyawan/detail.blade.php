@extends('layouts.dashboard')

@section('owner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Karyawan</h1>
</div>

<div class="row">
    <div class="container">
        <div class="col-12 col-md-12">
            <form action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->user->name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Divisi</label>
                    @if ($data->divisi_id === null)
                        
                    <input type="text" class="form-control" id="nama" value="" disabled>
                    @else
                    
                    <input type="text" class="form-control" id="nama" value="{{$data->divisi->divisi}}" disabled>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->jabatan}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">No. Hp</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->hp}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Kota / Kabupaten</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->kota}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->kec}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->pos}}" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Karyawan</h1>
</div>

<div class="row">
    <div class="container">
        <div class="col-12 col-md-12">
            <form action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->user->name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Divisi</label>
                    @if ($data->divisi_id === null)
                        
                    <input type="text" class="form-control" id="nama" value="" disabled>
                    @else
                    
                    <input type="text" class="form-control" id="nama" value="{{$data->divisi->divisi}}" disabled>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->jabatan}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">No. Hp</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->hp}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Kota / Kabupaten</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->kota}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->kec}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->pos}}" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection