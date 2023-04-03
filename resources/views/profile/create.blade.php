@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/profile" method="post" class="form-group">
            @csrf
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="mb-3">
                        <label for="hp" class="form-label">No. Hp</label>
                        <input type="number" name="hp" class="form-control @error('hp')
                            is-invalid
                        @enderror" id="hp" placeholder="">
                        @error('hp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" name="divisi" class="form-control @error('divisi')
                            is-invalid
                        @enderror" id="divisi" placeholder="">
                        @error('divisi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan')
                            is-invalid
                        @enderror" id="jabatan" placeholder="">
                        @error('jabatan')
                            <div class="invalid-feedbback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota / Kabupaten</label>
                        <input type="text" name="kota" class="form-control @error('kota')
                            is-invalid
                        @enderror" id="kota" placeholder="">
                        @error('kota')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kec" class="form-label">Kecamatan</label>
                        <input type="text" name="kec" class="form-control @error('kec')
                            is-invalid
                        @enderror" id="kec" placeholder="">
                        @error('kec')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pos" class="form-label">Kode Pos</label>
                        <input type="text" name="pos" class="form-control @error('pos')
                            is-invalid
                        @enderror" id="pos" placeholder="">
                        @error('pos')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat')
                            is-invalid
                        @enderror" id="alamat" rows="2"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
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