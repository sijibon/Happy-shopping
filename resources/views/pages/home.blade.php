@extends('layouts.frontend_layouts')
@section('header_content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach ($img_slide as $key => $slider)  
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">              
            <img style="height: 400px; width:400px" class="d-block w-100" src="{{ url ($slider->slide_image)}}">
            <div class="carousel-caption d-none d-md-block">
            </div>
      </div>
      @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

@endsection

@section('content')
        <!-- Categories Section Begin -->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @foreach ($products as $item)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset ($item->product_image1)}}">
                            <h5><a href="#">{{$item->product_name}}</a></h5>
                            </div>
                         </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->
    
        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Featured Product</h2>
                        </div>
                        <div class="featured__controls">
                            <ul>
                                <li class="active" data-filter="*">All</li>
                                @foreach ($category as $item)
                               <li data-filter=".filter{{$item->id}}">{{$item->category_name}}</li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">

                @foreach ($category as $item)
                @php
                   $products = DB::table('products')
                  ->join('currencies','products.currency_id','=','currencies.id')
                  ->select('currencies.currency_icon','products.*')->where('category_id', $item->id)->where(['product_status'=>1])->get();
                @endphp

                @foreach ($products as $product)  
                    <div class="col-md-3 mt-2 mb-2 mix filter{{$item->id}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-im bg-imageg-actions" data-setbg="{{ asset ($product->product_image1)}}"><img src="{{ asset ($product->product_image1)}}" alt=""></div>
                            </div>
                            <div class="card-body bg-light text-center">
                                <div class="mb-2">
                                    <h6 class="font-weight-semibold mb-2"><h5 href="#" class="text-default mb-2" data-abc="true">{{$product->product_name}}</h5></h6>
                                </div>
                               <div class="d-flex justify-content-center">
                                    <p class="m-3 font-weight-semibold">{{$product->currency_icon}}{{$product->product_price}}</p>
                                    <p class="m-3 font-weight-semibold">{{$product->currency_icon}} <del>200</del></p>
                               </div>
                                <a href="{{ url('product-details/'.$product->id)}}" name="submit" class="btn bg-details"><i class="fa fa-info-circle mr-2"></i> Details</a>
                               <form action="{{url('add/to-cart'.$product->id)}}" method="POST">
                                @csrf
                              <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                                <button type="submit" name="submit" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>                            
                            </form>    
                            </div>
                        </div>
                    </div> 
            @endforeach
            @endforeach                
        </div>
    </div>
</section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
            @foreach($banner_img as $banner)
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img style="height: 200px;width:500px" src="{{url($banner->banner_image)}}" alt="">
                    </div>
                </div>                 
                @endforeach
            </div>
        </div>
    </div>
    <br>
<!-- Banner End -->
@endsection