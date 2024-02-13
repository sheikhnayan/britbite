@extends('front.layouts.main')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Master Chef</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('index',[$slug]) }}">Home</a>
                <a href="#">Chef</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Team</p>
            <h2>Our Master Chef</h2>
        </div>
        <div class="row">
            @foreach ($data as $item)

            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{ asset($item->image) }}" alt="Image">
                        <div class="team-social">
                            <a target="_blank" href="{{ $item->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="{{ $item->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="{{ $item->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                            <a target="_blank" href="{{ $item->instagram }}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h2>{{ $item->name }}</h2>
                        <p>{{ $item->position }}</p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
@endsection


