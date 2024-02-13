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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Banner Edit</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Banner</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.banner.store',[$data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" value="{{ $data->title }}" class="form-control input-default" placeholder="Enter Title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" value="{{ $data->sub_title }}" class="form-control input-default" placeholder="Enter Sub Title" name="sub_title" required>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control input-default" name="image">
                                    <img src="{{ asset($data->banner) }}" width="100px">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="" class="form-control input-default" name="status">
                                        <option {{ $data->status == 1 ? 'selected':'' }} value="1">Active</option>
                                        <option {{ $data->status == 0 ? 'selected':'' }} value="0">Deactive</option>
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
