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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Menu</h4>
                        <div class="basic-form">
                            <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control input-default" placeholder="Enter Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input step="0.001" type="number" class="form-control input-default" placeholder="Enter Price" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control input-default" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control input-default" placeholder="Enter Description" name="description" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Food Category</label>
                                    <select class="form-control input-default" name="food_category_id">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>Offer Type</label>
                                  <select class="form-control input-default" name="buy_type" id="offer_type">
                                      <option value="null">None</option>
                                      <option value="get">Get</option>
                                      <option value="offer">Offer</option>
                                  </select>
                                </div>
                                <div class="offer">

                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Food Modifiers
                                  </label>
                                </div>
                                <br>
                                <div class="attribute" style="display: none">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="attribute[0][name]" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="attribute[0][price]" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <a onclick="add()" class="btn btn-success mt-4">Add + </a>
                                    </div>
                                  </div>
                                  <input type="hidden" id="count" value="0">
                                </div>

                                {{-- <div class="form-group">
                                    <label>Status</label>
                                    <select id="" class="form-control input-default" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div> --}}
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

<script>
  $('#flexCheckChecked').change(function(){
    console.log('works');
    if(this.checked) {
            $('.attribute').show();
        }else{
          $('.attribute').hide();
        }
  })

  function add(){
    count = $('#count').val();

    count = count+1;

    htmls = `<div class="row at`+count+`">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="attribute[`+ count +`][name]" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="attribute[`+ count +`][price]" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <a onclick="remove('`+count+`')" class="btn btn-danger mt-4">Remove - </a>
              </div>
            </div>`;

    $('#count').val(count);

    $('.attribute').append(htmls);


  }

    function remove(count){
      parent = $('.at'+count).remove();

      console.log(parent);
    }
</script>

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
