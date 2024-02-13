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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu Edit</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Menu</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.menu.update',[$data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control input-default" value="{{ $data->name }}" placeholder="Enter Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input step="0.001" type="number" class="form-control input-default" value="{{ $data->price }}" placeholder="Enter Price" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control input-default" name="image">
                                    <img src="{{ asset($data->image) }}" width="100px">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control input-default" placeholder="Enter Description" name="description" required> {{ $data->description }} </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Food Category</label>
                                    <select class="form-control input-default" name="food_category_id">
                                        @foreach ($category as $item)
                                            <option {{ $data->food_category_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>Offer Type</label>
                                  <select class="form-control input-default" name="buy_type" id="offer_type">
                                      <option {{ $data->buy_type == null ? 'selected' : '' }} value="null">None</option>
                                      <option {{ $data->buy_type == 'get' ? 'selected' : '' }} value="get">Get</option>
                                      <option {{ $data->buy_type == 'offer' ? 'selected' : '' }} value="offer">Offer</option>
                                  </select>
                                </div>
                                <div class="offer">
                                    @if ($data->buy_type == 'get')
                                    <div class="form-group">
                                      <label>Buy *</label>
                                      <input type="text" value="{{ $data->buy }}" class="form-control input-default" name="buy" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Get *</label>
                                        <input type="text" value="{{ $data->buy_get }}" class="form-control input-default" name="buy_get" required>
                                    </div>
                                    @elseif($data->buy_type == 'offer')
                                    <div class="form-group">
                                      <label>Buy *</label>
                                      <input type="text" value="{{ $data->buy }}" class="form-control input-default" name="buy" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Offer % *</label>
                                        <input type="text" value="{{ $data->buy_offer }}" class="form-control input-default" name="buy_offer" required>
                                    </div>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                                    <label>Status</label>
                                    <select id="" class="form-control input-default" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div> --}}
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

@section('js')
<script>
  $('#offer_type').on('change', function(){
    val = $('#offer_type').val();

    if (val == 'get') {
      htmls = `<div class="form-group">
                  <label>Buy *</label>
                  <input type="text" class="form-control input-default" name="buy" required>
              </div>
              <div class="form-group">
                  <label>Get *</label>
                  <input type="text" class="form-control input-default" name="buy_get" required>
              </div>`;
      $('.offer').html(htmls);

    } else if(val == 'offer') {
      htmls = `<div class="form-group">
                  <label>Buy *</label>
                  <input type="text" class="form-control input-default" name="buy" required>
              </div>
              <div class="form-group">
                  <label>Offer % *</label>
                  <input type="text" class="form-control input-default" name="buy_offer" required>
              </div>`;
      $('.offer').html(htmls);
    }else{
      $('.offer').empty();
    }
  })
</script>
@endsection
