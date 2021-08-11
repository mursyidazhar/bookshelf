@extends('layouts.app', ['title' => 'Create Collection'])

@section('content')

<div class="container">
        <div class="dashboard-content mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h2 class="text-center pt-2">Add Collection</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book's Title</label>
                                        <input type="text" name="judul" class="form-control" required autocomplete="off">    
                                    </div>    
                                </div>    
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Author</label>
                                        <input type="text" name="penulis" class="form-control" required autocomplete="off">    
                                    </div>    
                                </div>    
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Date Published</label>
                                        <input type="text" name="thn_terbit" class="form-control" required autocomplete="off">    
                                    </div>    
                                </div>    
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control" required>    
                                    </div>    
                                </div>    
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="categories_id" class="form-select">
                                            <option selected disabled>Choose Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                            @endforeach
                                        </select>    
                                    </div>    
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Total Page</label>
                                        <input type="number" name="jml_halaman" class="form-control" required>    
                                    </div>    
                                </div>     
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Purchased date</label>
                                        <input type="text" name="tgl_beli" class="form-control" required autocomplete="off">    
                                    </div>    
                                </div>     
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>What you get from this book?</label>
                                        <textarea name="ulasan" class="form-control" cols="30" rows="4"></textarea> 
                                    </div>    
                                </div>     
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Score</label>
                                        <input type="number" class="form-control" name="nilai" required>
                                    </div>    
                                </div>     
                            </div> 
                             <div class="row">
                                <div class="col mt-3">
                                    <button type="submit" class="btn btn-success px-5">
                                        Add
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection