@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Coupon</a>
      <a class="breadcrumb-item" href="index.html">Edit</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    {{-- 2nd collums  --}}
             <div class="col-8  mt-5">
                <div class="card">
                    <div class="card-header">
                     <span id="addT">Edit Coupon</span>
                    </div>   
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card-body">
                        <form action="{{ url ('update/coupon'.$editCoupon->id)}}" method="post">
                          @csrf
                            <div class="form-group m-2">
                            <label for="inputEmail4">Coupon Name</label>
                            <input type="text" name="coupon_name" class="form-control" id="name" value="{{$editCoupon->coupon_name}}">
                              </div>
                              <div class="form-group m-2">
                                <label for="inputEmail4">Coupon Discount</label>
                                <input type="text" name="discount" value="{{$editCoupon->discount}}" class="form-control" id="name" placeholder="coupon discount">
                              </div>
                              <div class="form-group m-2">
                              </div>
                            <div class="row justify-content-center mb-2" >
                                <button id="addBtn" class="btn btn-primary ">Update Coupon</button>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection