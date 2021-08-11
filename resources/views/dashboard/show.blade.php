@extends('layouts.app', ['title' => 'Collection'])

@push('addon-style')

<style>
    .card-display {
    cursor: pointer;
    transition: transform 0.3s;
    }
    .card-display:hover {
    transform: translateY(-16px);
    }
</style>

@endpush

@section('nav-collection', 'active')
@section('content')

<div class="section-content">
    <div class="container">
        <div class="row mt-3">
            
        </div>
        <div class="row mt-4">
            @php $waktu = 0   @endphp
            @foreach($books as $book)
            <div class="col-lg-2" data-aos="fade-up" data-aos-delay="{{$waktu += 100}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$book->id}}">
                <div class="card card-display mt-4" style="width: 10rem;" >
                    <img src="{{ asset('images/' . $book->photo) }}" class="card-img-top" alt="..." >
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop{{$book->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" id="{{$book->id}}" style="min-width: 740px;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Book Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3" >
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{ asset('images/' . $book->photo) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->judul}} ({{$book->thn_terbit}})</h5>
                            <h6 class="card-subtitle text-muted mb-3">{{$book->penulis}}</h6>
                            <p class="card-text"><small class="text-muted">Ulasan:</small></p>
                            <p class="card-text">{{$book->ulasan}}</p>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="like">
                        <button type="button" class="btn btn-danger"><img src="{{ asset('images/like.png')}}" class="img-fluid rounded-start" style="max-width: 18px"></button>
                        <small>671 likes</small>
                    </div>
                    <div class="dislike">
                        <button type="button" class="btn btn-secondary"><img src="{{ asset('images/dislike.png')}}" class="img-fluid rounded-start" style="max-width: 18px"></button>
                        <small>0 dislike</small>
                    </div>
                </div>
                </div>
            </div>
            </div>
            @endforeach

        </div>
        <div class="row text-center mt-4">
            <div class="col-lg-12">{{$books->links()}}</div>
        </div>
    </div>
</div>

@endsection