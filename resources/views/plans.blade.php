@extends('front.layouts.main')

@section('header')
    <link rel="stylesheet" href="{{ asset('login.css') }}">

    <style>
      .navbar{
        position: unset !important;
      }
    </style>
@endsection

@section('content')
    <div class="container" style="margin-top: 4rem;">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Select Plan:</div>



                    <div class="card-body">



                        <div class="row">

                            @foreach ($plans as $plan)
                                <div class="col-md-6">

                                    <div class="card mb-3">

                                        <div class="card-header">

                                            ${{ $plan->price }}/Mo

                                        </div>

                                        <div class="card-body">

                                            <h5 class="card-title">{{ $plan->name }}</h5>

                                            <p class="card-text">Some quick example text to build on the card title and make
                                                up the bulk of the card's content.</p>



                                            <a href="{{ route('plans.show', $plan->slug) }}"
                                                class="btn btn-primary pull-right">Choose</a>



                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection