@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cuti</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/cuti/{{Crypt::encrypt($data->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan</label>
                <input type="text" class="form-control" id="alasan" name="alasan" value="{{$data->alasan}}">
            </div>
            <div class="mb-3">
                <label for="mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="mulai" name="mulai" value="{{$data->mulai}}">
            </div>
            <div class="mb-3">
                <label for="akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="akhir" name="akhir" value="{{$data->akhir}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cuti</h1>
    <p><a href="/home">Dashboard</a> / Cuti </p>
</div>

<div class="row">
    <div class="container">
        <form action="/pengcuti/{{Crypt::encrypt($data->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan</label>
                <input type="text" class="form-control" id="alasan" name="alasan" value="{{$data->alasan}}">
            </div>
            <div class="mb-3">
                <label for="mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="mulai" name="mulai" value="{{$data->mulai}}">
            </div>
            <div class="mb-3">
                <label for="akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="akhir" name="akhir" value="{{$data->akhir}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection