@extends('admin.admin_layouts')
@section('category') active  @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dashboard</a>
      <a class="breadcrumb-item" href="index.html">Forms</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    <div class="col-8">
        <div class="card mt-5">
            <div class="card-header">
              <h5>All Category</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Active Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($all_categories as $row)
                    <tr>
                    <th scope="col">{{ $row->id }}</th>
                    <th scope="col">{{ $row->category_name }}</th>
                    <th scope="col">
                      
                      @if ($row->status ==1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Deactive</span> 
                      @endif

                    </th>
                      <th scope="col">
                      <a href="{{ url('edit/category'.$row->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="{{ url('delete/category'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      @if ($row->status ==1)
                      <a href="{{ url('category/deactive'.$row->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-times" aria-hidden="true"></i></a>
                      @else
                      <a href="{{ url('category/active'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                      @endif
                      </th>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table> 
            </div>
          </div>
            <div class="justify-content-center">
              {{ $all_categories->links() }}
            </div>
</div>
          

    {{-- 2nd collums  --}}
             <div class="col-4  mt-5">
                <div class="card">
                    <div class="card-header">
                     <span id="addT">Add New Category</span>
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
                        <form action="{{ route ('store.category')}}" method="post">
                          @csrf
                            <div class="form-group m-2">
                                <label for="inputEmail4">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="name" placeholder="Enter Category Name">
                              </div>
                              <div class="form-group m-2">
                              </div>
                            <div class="row justify-content-center mb-2" >
                                <button id="addBtn" class="btn btn-primary ">Add Category</button>
                            </div>  
                       </form>
                     </div>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection