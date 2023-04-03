@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jurnal</h1>
</div>

<div class="row">
    <div class="container">
        @php
            $jurnal = Crypt::encrypt($jur->id);
        @endphp
        <form action="/jurnal/{{$jurnal}}" method="post" class="form-group">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{$jur->nama}}">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{$jur->tanggal}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="status">
                    <option value="selesai" @if ($jur->status == 'selesai')
                        selected
                    @endif>Selesai</option>
                    <option value="tertunda" @if ($jur->status == 'tertunda')
                    selected
                @endif>Tertunda</option>
                  </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </form>
    </div>
</div>
@endsection