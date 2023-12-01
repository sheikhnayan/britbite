@extends('front.layouts.main')

@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $data->title }}</h2>
            </div>
            <div class="col-12">
                <a href="">Home</a>
                <a href="">{{ $data->title }}</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Single Post Start-->
<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>{{ $data->title }}</h2>
                    <p>{!! $data->content !!}</p>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Post End-->

@endsection

