@extends('admin.layouts.main')

@section('content')

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Team Payment Getaway</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Payment Setting</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.payment.update',[$data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Stripe Key</label>
                                    <input type="text" class="form-control input-default" value="{{ $data->stripe_key }}" placeholder="Enter Key" name="stripe_key" required>
                                </div>
                                <div class="form-group">
                                  <label>Stripe Secret</label>
                                  <input type="text" class="form-control input-default" value="{{ $data->stripe_secret }}" placeholder="Enter Secret" name="stripe_secret" required>
                              </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success input-default" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->

@endsection
