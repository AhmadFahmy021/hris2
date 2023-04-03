@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Karyawan</h1>
</div>

<div class="row">
    <div class="container">
        <div class="col-12 col-md-12">
            @php
                $id = Crypt::encrypt($data->id);
            @endphp
            <form action="/karyawan/{{$id}}" method="post">
                @csrf
                {{-- @method('POST') --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->user->name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <input type="text" class="form-control" id="divisi" name="divisi" value="{{$data->divisi}}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$data->jabatan}}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">No. Hp</label>
                    <input type="text" class="form-control" id="nama" name="hp" value="{{$data->hp}}" disabled>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection