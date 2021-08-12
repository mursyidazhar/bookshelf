@extends('layouts.app', ['title' => 'Home']);

@push('addon-style')
    <style>
        .right-hero {
            padding-left: 70px;
            padding-right: 60px;
            padding-top: 60px;
        }
        .hero {
            padding-left: 70px;
            padding-right: 70px
        }
        .hero img {
            height: 460px;
        }
        h1 {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 50px;
        }
        .trending {
            margin-top: 70px;
            border-bottom: 1px solid white;
            padding-bottom: 10px;
        }
        .trending img {
            height: 160px;
        }
        .card {
            background-color: transparent;
        }
        hr {
            color: white;
        }
        .about{
            background-color: aquamarine;
        }
    </style>
@endpush

@section('home-active', 'active')
@section('content')

    <div class="container">

        <section class="hero mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                        <img src="{{ asset('/images/book-lover.svg') }}" alt="">
                </div>
                <div class="col-md-6 text-white right-hero">
                    @if(Session::has('success'))
                    <div class="alert alert-primary" role="alert">
                    {{Session::get('success')}}
                    </div>
                    @endif
                    <h1>Books(h)elf help you manage your reading</h1>
                    <p>"Read, read, read. Read everything: trash, classics, good / bad and see how they do it. Just like a carpenter who works as an apprentice & studies the master. Read you'll absorb it. Then write. If it's good, you'll find out. If it's not, throw it out the window" -W Faulkner</p>
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Get started</a>
                    @endguest
                    @auth 
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-2">Start Read!</a>
                    @endauth
                </div>
            </div>
        </section>
        
        <section class="trending">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h2 class="text-white">Most Read Books</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-2 mr-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card" style="width: 8rem;">
                        <img src="{{ asset('images/think-again.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-2 mr-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card" style="width: 8rem;">
                        <img src="{{ asset('images/viktor-frankl.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-2 mr-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card" style="width: 8rem;">
                        <img src="{{ asset('images/think-again.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-2 mr-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card" style="width: 8rem;">
                        <img src="{{ asset('images/think-again.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="card" style="width: 8rem;">
                        <img src="{{ asset('images/think-again.jpg') }}" class="card-img-top mb-2" alt="...">
                    </div>
                </div>
                <div class="col-md-2" data-aos="fade-up" data-aos-delay="600">
                    <div class="card" style="width: 8rem;">
                        <img src="{{ asset('images/think-again.jpg') }}" class="card-img-top mb-2" alt="...">
                    </div>
                </div>
            </div>
        </section>

        <section class="about">
            about
        </section>
        
        
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6">
                <p class="text-white text-center mt-">&copy; 2021 by <a href="">Mursyid Azhar</a></p>
            </div>
        </div>
    </div>
        
        
@endsection