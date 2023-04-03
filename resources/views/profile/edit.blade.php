@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="container">
        @php
            $id = Crypt::encrypt($prof->id);
        @endphp
        <form action="/profile/{{$id}}" method="post" class="form-group">
            @csrf
            @method('PUT')
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="mb-3">
                        <label for="hp" class="form-label">No. Hp</label>
                        <input type="number" name="hp" class="form-control" id="hp" value="{{$prof->hp}}">
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" name="divisi" class="form-control" id="divisi" value="{{$prof->divisi}}">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{$prof->jabatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota / Kabupaten</label>
                        <input type="text" name="kota" class="form-control" id="kota" value="{{$prof->kota}}">
                    </div>
                    <div class="mb-3">
                        <label for="kec" class="form-label">Kecamatan</label>
                        <input type="text" name="kec" class="form-control" id="kec" value="{{$prof->kec}}">
                    </div>
                    <div class="mb-3">
                        <label for="pos" class="form-label">Kode Pos</label>
                        <input type="text" name="pos" class="form-control" id="pos" value="{{$prof->pos}}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="2">{{$prof->alamat}}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="container">
        @php
            $id = Crypt::encrypt($prof->id);
        @endphp
        <form action="/profile/{{$id}}" method="post" class="form-group">
            @csrf
            @method('PUT')
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="mb-3">
                        <label for="hp" class="form-label">No. Hp</label>
                        <input type="number" name="hp" class="form-control" id="hp" value="{{$prof->hp}}">
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" name="divisi" class="form-control" id="divisi" value="{{$prof->divisi}}">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{$prof->jabatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota / Kabupaten</label>
                        <input type="text" name="kota" class="form-control" id="kota" value="{{$prof->kota}}">
                    </div>
                    <div class="mb-3">
                        <label for="kec" class="form-label">Kecamatan</label>
                        <input type="text" name="kec" class="form-control" id="kec" value="{{$prof->kec}}">
                    </div>
                    <div class="mb-3">
                        <label for="pos" class="form-label">Kode Pos</label>
                        <input type="text" name="pos" class="form-control" id="pos" value="{{$prof->pos}}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="2">{{$prof->alamat}}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection