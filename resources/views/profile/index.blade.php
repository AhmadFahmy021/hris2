@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    @if ($data == null)
        
    <a href="profile/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        Tambah Profile
    </a>

     @else
     @php
         $id = Crypt::encrypt($data->id);
     @endphp
    <a href="profile/{{$id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-pen fa-sm text-white-50"></i> 
        Edit Profile
    </a>
        
    @endif
</div>

<div class="row">
    <div class="container">
        @if ($data == null)
        <form action="" method="post" class="">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 ">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->name}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->username}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">No. Hp</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kota / Kabupaten</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=""  disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kecamatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=""disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kode Pos</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=""  disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="" disabled class="form-control" id="" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </form>
        @else
        <form action="" method="post" class="">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 ">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->name}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->username}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">No. Hp</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $data->hp }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->divisi}}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->jabatan}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kota / Kabupaten</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->kota}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kecamatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->kec}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kode Pos</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->pos}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="" disabled class="form-control" id="" rows="2">{{$data->alamat}}</textarea>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    @if ($data == null)
        
    <a href="profile/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        Tambah Profile
    </a>

     @else
     @php
         $id = Crypt::encrypt($data->id);
     @endphp
    <a href="profile/{{$id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-pen fa-sm text-white-50"></i> 
        Edit Profile
    </a>
        
    @endif
</div>

<div class="row">
    <div class="container">
        @if ($data == null)
        <form action="" method="post" class="">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 ">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->name}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->username}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">No. Hp</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kota / Kabupaten</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=""  disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kecamatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=""disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kode Pos</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder=""  disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="" disabled class="form-control" id="" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </form>
        @else
        <form action="" method="post" class="">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 ">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->name}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->username}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">No. Hp</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $data->hp }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->divisi}}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->jabatan}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kota / Kabupaten</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->kota}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kecamatan</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->kec}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kode Pos</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$data->pos}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="" disabled class="form-control" id="" rows="2">{{$data->alamat}}</textarea>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection