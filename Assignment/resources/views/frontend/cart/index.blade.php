@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    
    <main class="main">
        <div class="container">
            @if ($cart->isEmpty())
                <h1>Your cart is empty.</h1>
            @else
                <h1>Shopping Cart</h1>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="thumbnail-col"></th>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Quantity</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->listCart() as $key => $value)
                                        <tr class="product-row">
                                            <td>
                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="{{ asset('storage') }}/{{ $value['image'] }}"
                                                            alt="product" width="80px" height="80px">
                                                    </a>

                                                    <a href="#" class="btn-remove" title="Remove Product">x</a>
                                                </figure>
                                            </td>
                                            <td class="product-col">
                                                <h5 class="product-title">
                                                    <a href="product.html">{{ $value['name'] }}</a>
                                                </h5>
                                            </td>
                                            <td>{{ number_format($value['price']) }}</td>
                                            <td>
                                                <div class="product-single-qty">
                                                    <input class="horizontal-quantity form-control" type="text"
                                                        value="{{ $value['quantity'] }}">
                                                </div><!-- End .product-single-qty -->
                                            </td>
                                            <td class="text-right"><span
                                                    class="subtotal-price">{{ number_format($value['price'] * $value['quantity']) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="clearfix">
                                            <div class="float-left">
                                                <div class="cart-discount">
                                                    <form action="#">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="Coupon Code" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-sm" type="submit">Apply
                                                                    Coupon</button>
                                                            </div>
                                                        </div><!-- End .input-group -->
                                                    </form>
                                                </div>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">
                                                <button type="submit" class="btn btn-shop btn-update-cart">
                                                    Update Cart
                                                </button>
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div><!-- End .cart-table-container -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>CART TOTALS</h3>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>{{ number_format($cart->getTotalPrice()) }}</td>
                                    </tr>

                                    <tr>
                                        <form action="{{ route('cart.checkout') }}" method="POST">
                                            @csrf
                                            {{-- <input type="file" value="{{ $value['image'] }}" name="image"> --}}
                                            <input type="hidden" value="{{ $value['name'] }}" name="product_name">
                                            <input type="hidden" value="{{ $cart->getTotalPrice() }}" name="total">
                                            <input type="hidden" value="{{ $value['quantity'] }}" name="quantity">
                                            {{-- <input type="hidden" value="{{ asset('storage/' . $value['image']) }}" name="image"> --}}
                                            {{-- @if ($value['image'])
                                            <img src="{{ asset('storage/' . $value['image']) }}" alt="Product Image"
                                                width="80px" height="80px">
                                        @endif --}}

                                            <td colspan="2" class="text-left">
                                                <h4>Shipping</h4>
                                                <div class="form-group form-group-custom-control">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="shipping"
                                                            checked value="Thanh toán tại nhà">
                                                        <label class="custom-control-label">Thanh toán tại nhà</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .form-group -->

                                                <div class="form-group form-group-custom-control mb-0">
                                                    <div class="custom-control custom-radio mb-0">
                                                        <input type="radio" name="shipping" class="custom-control-input"
                                                            value="Thanh toán online">
                                                        <label class="custom-control-label">Thanh Toán Online</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .form-group -->


                                                <div class="form-group form-group-sm">
                                                    <label class="mt-1"><strong>Địa Chỉ </strong></label>
                                                    <div class="select-custom">
                                                        <select class="form-control form-control-sm" name="city">
                                                            <option value="USA">United States (US)</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="China">China</option>
                                                            <option value="Germany">Germany</option>
                                                        </select>
                                                    </div><!-- End .select-custom -->
                                                </div><!-- End .form-group -->

                                                <div class="form-group form-group-sm">
                                                    <div class="">
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="Họ và tên" name="name">
                                                    </div><!-- End .select-custom -->
                                                </div><!-- End .form-group -->

                                            </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{ number_format($cart->getTotalPrice()) }}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <!-- Thêm thông tin thanh toán, ví dụ: địa chỉ giao hàng, phương thức thanh toán -->
                                <button type="submit" class="btn btn-block btn-dark">Proceed to Checkout
                                    <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
        @endif
    </main><!-- End .main -->
@endsection
