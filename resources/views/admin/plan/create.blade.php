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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Plan</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Plan</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.plan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control input-default" placeholder="Enter Name" name="name" required>
                                </div>
                                <div class="form-group">
                                  <label>Slug</label>
                                  <input type="text" class="form-control input-default" placeholder="Enter Slug" name="slug" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control input-default" placeholder="Enter Price" name="price" required>
                                </div>
                                <div class="form-group">
                                  <label>Stripe ID</label>
                                  <input type="text" class="form-control input-default" placeholder="Enter Stripe ID" name="stripe_plan" required>
                                </div>
                                <div class="form-group">
                                  <label>Description</label>
                                  <textarea name="description" class="form-control input-default" cols="30" rows="10"></textarea>
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
