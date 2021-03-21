@extends('admin.admin_layouts')
@section('product') active show-sub @endsection
@section('add-product') active  @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('/')}}">Dashboard</a>
      <a class="breadcrumb-item" href="index.html">Add Products</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add Product</h6>
            <p class="mg-b-20 mg-sm-b-30">This products only for admin</p>
        <form action="{{ route ('store-product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name:</label>
                  <input class="form-control" type="text" name="product_name" value="{{old('product_name')}}" placeholder=" product name">
                  @error('product_name')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code </label>
                  <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}"  placeholder=" product code">
                  @error('product_code')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price </label>
                    <input class="form-control" type="text" name="product_price" value="{{ old('product_price')}}" placeholder="  product price">
                    @error('product_price')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Price Currency</label>
                    <select class="form-control select2" value="{{ old('currency_id')}}" name="price_currency" data-placeholder="Choose country">
                      <option label="Choose Currency" disabled></option>
                        @foreach ($currency as $currency_icon) 
                       <option value="{{$currency_icon->id}}">{{$currency_icon->currency_icon}}</option>
                        @endforeach
                  </select>
                    @error('price_currency')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>

                  {{-- drop-down --}}
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Category </label>   
                         <select id="category" class="form-control select2" value="{{old('category_id')}}" name="category_id" data-placeholder="Choose country">
                          <option label="Choose Category" disabled></option>
                            @foreach ($category as $category_items) 
                           <option value="{{$category_items->id}}">{{$category_items->category_name}}</option>
                            @endforeach
                      </select>
                      @error('category_id')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                                 
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Subcategory </label>   
                         <select id="sub_category" class="form-control select2" value="" name="subcategory" data-placeholder="Choose country">
                          <option label="Choose Category" disabled></option>    
                           
                      </select>
                    </div>
                  </div><!-- col-4 -->

                 {{-- drop-down --}}
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brand</label>
                      <select class="form-control select2" value="{{ old('brand_id')}}" name="brand_id" data-placeholder="Choose country">
                        <option label="Choose Brand" disabled></option>
                          @foreach ($brand as $brand_item)
                         <option value="{{$brand_item->id}}">{{$brand_item->brand_name}}</option> 
                          @endforeach
                      </select>
                      @error('brand_id')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                 
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Product Quantity </label>
                    <input class="form-control" type="number"   name="product_quantity"  value="{{ old('product_quantity')}}" placeholder="  product quantity">
                    @error('product_quantity')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Image(1) </label>
                      <input class="form-control" value="{{ old('product_image1')}}" type="file" name="product_image1">
                    </div>
                    @error('product_image1')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Image(2) </label>
                      <input class="form-control" value="{{ old('product_image2')}}" type="file" name="product_image2">
                      @error('product_image2')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Image(3) </label>
                      <input class="form-control" value="{{ old('product_image3')}}" type="file" name="product_image3">
                      @error('product_image3')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                   
                  <div class="col-lg-6">
                    <div class="form-group">
                      <h6 class="form-control-label">Product Title </h6>
                      <textarea name="product_title" value="{{ old('product_title')}}" id="" cols="60" rows="5" placeholder="Product Title"></textarea>
                    </div>
                    @error('product_title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div><!-- col-4 -->
                  <div class="col-lg-6">
                    <div class="form-group">
                        <h6 class="form-control-label">Product Details </h6>
                      <textarea name="product_details" value="{{ old('product_details')}}" id="" cols="60" rows="5" placeholder="Product Description"></textarea>
                    </div>
                    @error('product_details')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
              </div>
            </div><!-- row -->
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Add Products</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
  
  // if(jQuery){
  //   console.log("Loaded");
  // }else{
  //   onsole.log("Not Loaded");
  // }

  $(document).ready(function () {

    $('#category').on('change',function() {
      var cat_id = $(this).val();
      // alert(cat_id);

      $.ajax({
        url:'{{ route("get_subcategory") }}',
        data:{cat_id:cat_id},
        success:function(data){
          $('#sub_category').html(data);
          console.log('Successfully Got Subcategory')
        },
        error:function(){
          console.log('Unsuccessfull get Subcategory')
        }
      })

      })

    });

  </script>
@endsection