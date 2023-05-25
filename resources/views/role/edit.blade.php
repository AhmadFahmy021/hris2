@extends('layouts.dashboard')

@section('owner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800 mb-0">
        Kelola Role
    </h1>
</div>

<div class="row">
    <div class="container d-flex justify-content-center">
        <div class="col-md-6">
            <form action="/users/{{Crypt::encrypt($data->id)}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" disabled value="{{$data->name}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" disabled value="{{$data->username}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" disabled value="{{$data->email}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select class="form-control" name="role" id="">
                        @foreach ($role as $rl)
                            <option value="{{$rl->id}}" @if ($data->role_id == $rl->id)
                                selected
                            @endif>{{$rl->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-grid text-center">
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection