@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gaji Karyawan</h1>
    
</div>

<div class="row">
    <div class="container d-flex justify-content-center">
        <div class="col-md-8 ">
            <form action="/gaji" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Karyawan</label>
                    <select name="user_id" id="" class="form-control @error('user_id')
                        is-invalid
                    @enderror">
                        @foreach ($users as $us)
                            <option value="{{$us->id}}">{{$us->name}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">
                            Nama Karyawan Sudah Di Masukkan
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="pokok" class="form-control @error('pokok')
                        is-invalid
                    @enderror" value="0">
                    @error('pokok')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Bonus</label>
                    <input type="number" name="bonus" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Bonus Lembur</label>
                    <input type="number" name="lembur" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('owner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gaji Karyawan</h1>
    
</div>

<div class="row">
    <div class="container d-flex justify-content-center">
        <div class="col-md-8 ">
            <form action="/kelola/gaji" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Karyawan</label>
                    <select name="user_id" id="" class="form-control @error('user_id')
                        is-invalid
                    @enderror">
                        @foreach ($users as $us)
                            <option value="{{$us->id}}">{{$us->name}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">
                            Nama Karyawan Sudah Di Masukkan
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="pokok" class="form-control @error('pokok')
                        is-invalid
                    @enderror" value="0">
                    @error('pokok')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Bonus</label>
                    <input type="number" name="bonus" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <label for="pokok" class="form-label">Bonus Lembur</label>
                    <input type="number" name="lembur" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection