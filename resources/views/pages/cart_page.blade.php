@extends('layouts.frontend_layouts')
@section('header_content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset ('frontend')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                     <a href="{{ url('/')}}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $carts)     
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset ($carts->product->product_image1)}}" alt="product image1" height="100px;" width="120px;">
                                 <h5>{{$carts->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ $carts->product_price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                    <form action="{{url('quantity/update'.$carts->id)}}" method="POST">
                                        @csrf
                                        <div class="pro-qty">
                                        <input type="text" name="quantity" value="{{$carts->product_quantity}}" min="1">
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                                    </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{ $carts->product_quantity * $carts->product_price}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ url('remove/cart'.$carts->id)}}">
                                        <span class="icon_close"> </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                    <li>Subtotal <span>${{ $total}}</span></li>
                        <li>Total <span>${{ $total}}</span></li>
                    </ul>
                    <a href="" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection