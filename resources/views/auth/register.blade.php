@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center pb-2 mb-2 fw-bold">Register</h1>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('Nama')}}</label>
                            <input type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror" id="name" value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">{{__('Username')}}</label>
                            <input type="text" name="username" class="form-control @error('username')
                                is-invalid
                            @enderror" id="username" value="{{old('username')}}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('Email Address')}}</label>
                            <input type="email" name="email" class="form-control @error('email')
                                is-invalid
                            @enderror" id="email" value="{{old('email')}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{__('Password')}}</label>
                            <input type="password" name="password" class="form-control @error('password')
                                is-invalid
                            @enderror" id="password" autocomplete="new-password" >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{__('Confirm Password')}}</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password')
                            is-invalid
                        @enderror" id="password-confirm" autocomplete="new-password">
                        @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>

                        <div class="mb-3 d-flex">
                            <button type="submit" class="btn btn-primary">{{ __('Register')}}</button>
                            <a href="/login" class="ms-auto pt-2" style="text-decoration: none;">Sudah punya akun</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
