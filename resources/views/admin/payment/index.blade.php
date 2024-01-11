@extends('admin.layouts.main')

@section('css')
    <link href="{{ asset('admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment Setting</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="float: left">Payment Setting</h4>
                        {{-- <a href="{{ route('admin.setting.add') }}" style="float: right" class="btn btn-success">Add</a> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Key</th>
                                        <th>Secret</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)

                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->stripe_key }}</td>
                                        <td>{{ $item->stripe_secret }}</td>
                                        <td>
                                            <a href="{{ route('admin.payment.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                            {{-- <a href="{{ route('admin.setting.delete',[$item->id]) }}" class="btn btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>SI</th>
                                    <th>Key</th>
                                    <th>Secret</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                            </table>
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
    <script src="{{ asset('admin/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection

