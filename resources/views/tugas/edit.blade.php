@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/tugas/{{Crypt::encrypt($tugas->id)}}" method="POST">
            @csrf
            @method('PUT')
            {{$tugas->user_id}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <select class="custom-select" name="nama">
                    @foreach ($data as $dt)
                        <option value="{{$dt->id}}" @if ($tugas->user_id == $dt->id)
                            selected
                        @endif>{{$dt->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tugas" class="form-label">Tugas</label>
                <textarea name="tugas" id="tugas" cols="30" rows="10" class="form-control @error('tugas')
                    is-invalid
                @enderror">{{$tugas->tugas}}</textarea>
                @error('tugas')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" name="selesai" id="selesai" class="form-control" value="{{$tugas->selesai}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection