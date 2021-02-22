@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Category</a>
      <a class="breadcrumb-item" href="index.html">Edit</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    {{-- 2nd collums  --}}
             <div class="col-8  mt-5">
                <div class="card">
                    <div class="card-header">
                     <span id="addT">Edit Slide image</span>
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
                        <form action="{{url('update/slider_image'.$edit_img->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group m-2">
                                <label for="inputEmail4">Slide image</label>
                                <input type="file" name="slider_image" class="form-control">
                                <img style="height: 80px; width:100px" src="{{url($edit_img->slide_image)}}" alt="">
                              </div>
                              <div class="form-group m-2">
                              </div>
                            <div class="row justify-content-center mb-2" >
                                <button id="addBtn" class="btn btn-primary ">update image</button>
                            </div>  
                       </form>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection