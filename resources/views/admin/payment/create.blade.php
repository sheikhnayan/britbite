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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Team Banner</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Setting</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control input-default" placeholder="Enter Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control input-default" placeholder="Enter Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control input-default" placeholder="Enter Phone" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control input-default" placeholder="Enter Address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control input-default" name="logo" required>
                                </div>
                                <div class="form-group">
                                    <label>Video</label>
                                    <input type="text" class="form-control input-default" name="video">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea type="text" class="form-control input-default" placeholder="Enter Content" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control input-default" name="facebook" placeholder="Enter Facebook Link">
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control input-default" name="twitter" placeholder="Enter Twitter Link">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" class="form-control input-default" name="linkedin" placeholder="Enter Linkedin Link">
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control input-default" name="instagram" placeholder="Enter Instagram Link">
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control input-default" name="youtube" placeholder="Enter Youtube Link">
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
