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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Page</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Page</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.page.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control input-default" placeholder="Enter Title" name="title" required>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Content <em class="text-danger">*</em></label>
                                  <div class="col-sm-6">
                                    <textarea class="form-control" name="content"></textarea><br>
                                  </div>
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

@section('js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('content');

    CKEDITOR.instances['content'].setData({!! json_encode($data->content ?? '') !!})
  </script>
@endsection
