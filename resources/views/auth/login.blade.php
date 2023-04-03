@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center pb-2 mb-2 fw-bold">Login</h1>
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username')
                                is-invalid
                            @enderror" id="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password')
                                is-invalid
                            @enderror" id="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>
                        <div class="mb-3 d-flex">
                            <button type="submit" class="btn btn-primary">{{ __('Login')}}</button>
                            <a href="/register" class="ms-auto pt-2" style="text-decoration: none;">Buat Akun</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
