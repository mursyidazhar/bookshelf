@extends('layouts.app', ['title' => 'Register']);

@push('addon-style')
    <style>
        img {
            height: 380px;
        }
        /* h3, label {
            color: rgb(51, 49, 49);
        } */
        .card{
            background-color: rgb(55, 55, 83);
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-6">
                    <img src="{{ asset('/images/register.svg') }}" alt="" class="container-fluid">
            </div>
            <div class="col-md-6 text-white right-hero">
                <div class="card text-left">
                    <div class="card-header">
                        <h3>Create new account</h3>
                    </div>
                  <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email')border border-danger @enderror" placeholder="example@gmail.com" value="{{old('email')}}">
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name')border border-danger @enderror" placeholder="Enter your email" value="{{old('name')}}">
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password')border border-danger @enderror" placeholder="Password at least 6 characters">
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6">
                <p class="text-white text-center mt-">&copy; 2021 by <a href="">Mursyid Azhar</a></p>
            </div>
        </div>
    </div>
@endsection