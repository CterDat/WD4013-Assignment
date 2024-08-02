@extends('layouts.app')
@section('content')
    <?php $showBanner = true; ?>
    <div class="row">
        @foreach ($listTop5 as $index => $cl)
            <div class="col-6 col-md-4 col-xl-3">
                <div class="product-default inner-quickview inner-icon">

                    <input type="hidden" name="product_id" value="{{ $cl->id }}">
                    <figure>
                        <a href="{{ route('products.show', $cl) }}">
                            <img src="{{ Storage::url($cl->image) }}" width="217" height="217" alt="product">
                        </a>
                        {{-- 
                        {{ Storage::url($cl->image) }}
                        --}}
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                        <div class="btn-icon-group">
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cl->id }}">
                                <div class="product-single-qty">
                                    <input type="hidden" value="1" name="quantity">
                                </div>
                                <!-- End .product-single-qty -->

                                <button type="submit" title="Add To Cart" class="btn-icon  product-type-simple"><i
                                        class="icon-shopping-cart"></i></button>
                            </form>

                        </div>
                        <a href="{{ route('products.show', $cl) }}" class="btn-quickview" title="Quick View">Quick
                            View</a>
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="demo23-shop.html" class="product-category">category</a>
                            </div>
                            <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                    class="icon-heart"></i></a>
                        </div>
                        <h3 class="product-title">
                            <a href="{{ route('products.show', $cl) }}">{{ $cl->name }}</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings star" style="width:80%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <div class="price-box">
                            <span class="product-price">${{ $cl->price }}</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>

            </div>
        @endforeach
    </div>
@endsection
