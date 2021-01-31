@extends('admin.admin_layouts')
@section('product') active show-sub @endsection
@section('manage-product') active  @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('/')}}">Dashboard</a>
      <a class="breadcrumb-item" href="index.html">Edit Products</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Product</h6>
            <p class="mg-b-20 mg-sm-b-30">This products only for admin</p>
         <form action="{{url('update/product'.$editProduct->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name:</label>
                  <input class="form-control" type="text" name="product_name" value="{{$editProduct->product_name}}" placeholder=" product name">
                  @error('product_name')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code </label>
                  <input class="form-control" type="text" name="product_code" value="{{$editProduct->product_code}}"  placeholder=" product code">
                  @error('product_code')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price </label>
                    <input class="form-control" type="text" name="product_price" value="{{$editProduct->product_price}}" placeholder="  product price">
                    @error('product_price')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Product Quantity </label>
                    <input class="form-control" type="number"   name="product_quantity"  value="{{$editProduct->product_quantity}}" placeholder="  product quantity">
                    @error('product_quantity')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                  {{-- drop-down --}}
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Category </label>   
                    <select class="form-control select2" value="#" name="category_id" data-placeholder="Choose country">
                          <option label="Choose Category" active></option>
                            @foreach ($category as $category_items) 
                           <option value="{{$category_items->id}}" {{$category_items->id == $editProduct->category_id ? "selected" : ""}}>{{$category_items->category_name}}</option>
                            @endforeach
                      </select>
                      @error('category_id')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                 {{-- drop-down --}}
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brand</label>
                      <select class="form-control select2" value="#" name="brand_id" data-placeholder="Choose country">
                        <option label="Choose Brand"></option>
                          @foreach ($brand as $brand_item)
                         <option value="{{$brand_item->id}}" {{$brand_item->id == $editProduct->category_id? "selected" : ""}}>{{$brand_item->brand_name}}</option> 
                          @endforeach
                      </select>
                      @error('brand_id')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 --> 
                  <div class="col-lg-6">
                    <div class="form-group">
                      <h6 class="form-control-label">Product Title </h6>
                    <textarea name="product_title" value="" id="" cols="60" rows="5" placeholder="Product Title">{{$editProduct->product_title}}</textarea>
                    </div>
                    @error('product_title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div><!-- col-4 -->
                  <div class="col-lg-6">
                    <div class="form-group">
                        <h6 class="form-control-label">Product Details </h6>
                      <textarea name="product_details" value="#" id="" cols="60" rows="5" placeholder="Product Description">{{$editProduct->product_details}}</textarea>
                    </div>
                    @error('product_details')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
              </div>
            </div><!-- row -->
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Update Products</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->
            
          <div class="row row-sm mt-5">
          <form action="{{url('update/image'.$editProduct->id)}}" method="post" enctype="multipart/form-data">
             @csrf
            <input type="hidden" name="image1" value="{{$editProduct->product_image1}}">
            <input type="hidden" name="image2" value="{{$editProduct->product_image2}}">
            <input type="hidden" name="image3" value="{{$editProduct->product_image3}}">

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Image(1) </label>
                  <input class="form-control" type="file" name="product_image1">
                <img src="{{asset($editProduct->product_image1)}}" alt="product image1" height="80px;" width="100px;">
                </div>
                @error('product_image1')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Image(2) </label>
                  <input class="form-control" type="file" name="product_image2">
                  <img src="{{asset($editProduct->product_image2)}}" alt="product image2" height="80px;" width="100px;">
                  @error('product_image2')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Image(3) </label>
                <input class="form-control" type="file" name="product_image3">
                <img src="{{asset($editProduct->product_image3)}}" alt="product image3" height="80px;" width="100px;">
                @error('product_image3')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            </div><!-- col-4 -->
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Products Image</button>
            </div>
          </div>
          </form>
          </div>
        </div>
      </div>

@endsection