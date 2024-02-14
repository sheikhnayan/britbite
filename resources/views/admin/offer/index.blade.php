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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Offer</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="float: left">Offer</h4>
                        <a href="{{ route('admin.offer.add') }}" style="float: right" class="btn btn-success">Add</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)

                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->offer_title }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->percentage }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="btn btn-success">Active</span>
                                            @else
                                                <span class="btn btn-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.offer.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.offer.delete',[$item->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>SI</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Percentage</th>
                                    <th>Status</th>
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

