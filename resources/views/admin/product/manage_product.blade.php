@extends('admin.admin_layouts')
@section('product') active show-sub @endsection
@section('manage-product') active  @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">admin</a>
      <a class="breadcrumb-item" href="index.html">Manage product</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-header">
              <h5>All Products list</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Product Code</th>
                      <th scope="col">Product Brand</th>
                      <th scope="col">Product quantity</th>
                      <th scope="col"> Product price </th>
                      <th scope="col"> Product title </th>
                      <th scope="col"> Product details </th>
                      <th scope="col">Product image</th>
                      <th scope="col">Active Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($manageProduct as $row)
                    <tr>
                    <th scope="col">{{ $row->id }}</th>
                    <th scope="col">{{ $row->product_name }}</th>
                    <th scope="col">{{ $row->product_code }}</th>
                    <th scope="col">{{ $row->brand->brand_name }}</th>
                    {{-- <th scope="col">{{ $row->category->category_name }}</th> --}}
                    <th scope="col">{{ $row->product_quantity }}</th>
                    <th scope="col">{{ $row->product_price }}</th>
                    <th scope="col">{{ $row->product_title }}</th>
                    <th scope="col">{{ $row->product_details }}</th>
                    <th scope="col">
                    <img src="{{ url ($row->product_image1)}}" alt="image1" height="70px;" width="100px;">
                    </th>
                    <th scope="col">
                      
                      @if ($row->product_status ==1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Deactive</span> 
                      @endif

                    </th>
                      <th scope="col" class="d-flex ">
                      <a href="{{ url('edit/product'.$row->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="{{ url('delete/product'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      @if ($row->product_status ==1)
                      <a href="{{ url('deactive/product'.$row->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-times" aria-hidden="true"></i></a>
                      @else
                      <a href="{{ url('active/product'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                      @endif
                      </th>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table> 
            </div>
          </div>
            <div class="justify-content-center">
              {{-- {{ $all_categories->links() }} --}}
            </div>
            </div>
        </div>
    </div>
</div>

@endsection



