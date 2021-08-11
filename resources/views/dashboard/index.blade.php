@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')

    <div class="section-content mt-5 section-dashboard-home" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="dashboard-heading">
                        <h3 class="dashboard-title text-white">Dashboard</h3>
                        <p class="dashboard-subtitle text-white">{{Auth::user()->name}}'s reading list</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('dashboard') }}">
                        <div class="input-group mb-3">
                        <input type="text" value="{{ request('search') }}" class="form-control" placeholder="Enter book's title or author" name="search">
                        <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
                    </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('dashboard') }}">
                        <div class="input-group">
                            <select name="filter" class="form-select" value="{{request('filter')}}" id="inputGroupSelect04">
                                <option disabled selected>Filter by category</option>
                                <option value="0">All Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" name="filter">{{$category->nama}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-danger" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('dashboard-create') }}" class="btn btn-primary mb-3">
                                    + Add
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Purchase Date</th>
                                            <th scope="col">Score</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($books as $index=>$book)
                                            <tr>
                                            <th scope="row">{{$index+1}}</th>
                                            <td>{{$book->judul}}</td>
                                            <td>{{$book->penulis}}</td>
                                            <td>{{$book->tgl_beli}}</td>
                                            <td>{{$book->nilai}}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('dashboard-edit', $book->id) }}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                                <form action="#" method="POST" onsubmit="return confirm('Hapu data?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger ms-2">Delete</button>
                                                </form>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-md-3">
                                {{$books->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection