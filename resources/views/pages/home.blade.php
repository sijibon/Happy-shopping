@extends('layouts.frontend_layouts')
@section('header_content')
<div class="hero__item set-bg" data-setbg="{{ asset ('frontend')}}/img/hero/banner.jpg">
    <div class="hero__text">
        <span>FRUIT FRESH</span>
        <h2>Vegetable <br />100% Organic</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
    </div>
</div>
@endsection

@section('content')
        <!-- Categories Section Begin -->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @foreach ($product as $item)
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
                   $products = App\Products::where( 'category_id', $item->id)->get(); 
                @endphp

                @foreach ($products as $product)  
                <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{$item->id}}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset ($product->product_image1)}}">
                                <ul class="featured__item__pic__hover">
                                <form action="{{url('add/to-cart'.$product->id)}}" method="POST">
                                    @csrf
                                  <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                                    <a type="submit" name="submit"><i class="fa fa-shopping-cart"></i></a>
                                </form>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                            <h6><a href="#">{{$product->product_name}}</a></h6>
                             <h5>${{$product->product_price}}</h5>
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
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset ('frontend')}}/img/banner/banner-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset ('frontend')}}/img/banner/banner-2.jpg" alt="Banner2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Banner End -->
@endsection