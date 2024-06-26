@extends('layouts.dashboard')

@section('owner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Karyawan</h1>
</div>

<div class="row">
    <div class="container">
        <div class="col-12 col-md-12">
            @php
                $id = Crypt::encrypt($data->id);
            @endphp
            <form action="/kelola/karyawan/{{$id}}" method="post">
                @csrf
                {{-- @method('POST') --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->user->name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <select class="form-control" name="divisi">
                        <option value=""></option>                 
                        @foreach ($div as $d)           
                            <option value="{{$d->id}}" @if ($data->divisi_id == $d->id)
                                selected
                            @endif>{{$d->divisi}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$data->jabatan}}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Tanggal Gajian</label>
                    <input type="date" class="form-control" id="jabatan" name="date_gaji" value="{{$data->date_gaji}}">
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
                    <select class="form-control" name="divisi">
                        <option value=""></option>                 
                        @foreach ($div as $d)           
                            <option value="{{$d->id}}" @if ($data->divisi_id == $d->id)
                                selected
                            @endif>{{$d->divisi}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$data->jabatan}}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Tanggal Gajian</label>
                    <input type="date" class="form-control" id="jabatan" name="date_gaji" value="{{$data->date_gaji}}">
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