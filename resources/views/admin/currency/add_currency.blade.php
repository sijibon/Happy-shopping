@extends('admin.admin_layouts')
@section('currency') active  @endsection

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dashboard</a>
      <a class="breadcrumb-item" href="index.html">Currency</a>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    <div class="col-8">
        <div class="card mt-5">
            <div class="card-header">
              <h5>Currency</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Currency</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($show_currency as $row)
                    <tr>
                    <th scope="col">{{$row->id}}</th>
                    <th scope="col">{{$row->currency_icon}}</th>
                      <th scope="col">
                      <a href="{{ url('delete/coupon'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      </th>
                    </tr>
                 @endforeach
                  </tbody>
                </table> 
            </div>
          </div>
          {{-- <div class="justify-content-center">
            {{ $row->links() }}
          </div> --}}
    </div>
    {{-- 2nd collums  --}}
             <div class="col-4  mt-5">
                <div class="card">
                    <div class="card-header">
                     <span id="addT">Add New Coupon</span>
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
                        <form action="{{ route('post_currency')}}" method="post">
                          @csrf
                            <div class="form-group m-2">
                                <label for="inputEmail4">Currency icon</label>
                                <input type="text" name="currency_icon" class="form-control" id="name" placeholder="currency icon">
                              </div>
                              <div class="form-group m-2">
                              </div>
                            <div class="row justify-content-center mb-2" >
                                <button id="addBtn" class="btn btn-primary ">Add Currency</button>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection