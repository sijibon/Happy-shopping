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
                                    <button class="btn btn-sm btn-warning" type="submit" name="submit">add to cart</button>
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
        <!-- Banner End -->
    
        <!-- Latest Product Section Begin -->
        <section class="latest-product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                   @php
                                        $product = App\Products::get();
                                   @endphp
                                    @foreach ($product as $products)    

                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                         <img src="{{ asset ($products->product_image1)}}" alt="latest product 1" style="height: 90px; width:100px;">
                                        </div>
                                        <div class="latest-product__item__text">
                                        <h6>{{$products->product_name}}</h6>
                                        <span>${{$products->product_price}}</span>
                                        </div>
                                    </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Top Rated Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @php
                                        $latestProducts = App\Products::latest()->limit(3)->get();
                                    @endphp
                                    @foreach ($latestProducts as $product)
                                        
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ($product->product_image1)}}" alt="" style="height: 90px; width:100px;">
                                        </div>
                                        <div class="latest-product__item__text">
                                         <h6>{{$product->product_name}}</h6>
                                            <span>${{$product->product_price}}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Review Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ('frontend')}}/img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ('frontend')}}/img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ('frontend')}}/img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ('frontend')}}/img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ('frontend')}}/img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset ('frontend')}}/img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Product Section End -->
    
        <!-- Blog Section Begin -->
        <section class="from-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>From The Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset ('frontend')}}/img/blog/blog-1.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset ('frontend')}}/img/blog/blog-2.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset ('frontend')}}/img/blog/blog-3.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Visit the clean farm in the US</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section End -->
@endsection