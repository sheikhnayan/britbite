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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Offer Edit</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Offer</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.offer.update',[$data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control input-default" value="{{ $data->offer_title }}" placeholder="Enter Title" name="offer_title" required>
                                </div>
                                <div class="form-group">
                                  <label>Description</label>
                                  <input type="text" class="form-control input-default" value="{{ $data->offer_description }}" placeholder="Enter Description" name="offer_description" required>
                              </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control input-default" value="{{ $data->start_date }}" placeholder="Enter Start Date" name="start_date" required>
                                </div>
                                <div class="form-group">
                                  <label>End Date</label>
                                  <input type="date" class="form-control input-default" value="{{ $data->end_date }}" placeholder="Enter End Date" name="end_date" required>
                                </div>
                                <div class="form-group">
                                  <label>Percentage</label>
                                  <input type="text" class="form-control input-default" value="{{ $data->percentage }}" placeholder="Enter Percentage" name="percentage" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="" class="form-control input-default" name="status">
                                        <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $data->status == 0 ? 'selected' : '' }} value="0">Deactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success input-default" value="Update">
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
