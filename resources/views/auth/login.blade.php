@extends('layouts.app', ['title' => 'Login']);

@push('addon-style')
    <style>
        .img img {
            width: 100px;
        
        }
        .card {
            display: flex;
            align-items: center;
            box-shadow: 0 8px 12px 0 rgb(49, 48, 48);
        }
        h5 {
            font-family: 'Open Sans Condensed', sans-serif;
            color: rgb(82, 79, 79);
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-4">
                <div class="card text-left">
                    <div class="img mt-3">
                        <img class="card-img-top" src="{{asset('/images/prof.svg')}}" alt="">
                        <h5 class="text-center">Sign in</h5>
                    </div>
                  <div class="card-body w-100">
                        @if(Session::has('account_created'))
                            <div class="alert alert-success">{{Session::get('account_created')}}</div>
                        @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" autofocus>
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <hr>
                    <p>Not a member? <a href="{{ route('register') }}">Sign up now</a></p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection