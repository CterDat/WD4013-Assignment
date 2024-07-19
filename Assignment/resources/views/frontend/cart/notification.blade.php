@extends('layout.master')
@section('frontend-product')
    <?php $showBanner = false; ?>
    <main class="main">
        <div class="container">
            <h1>Thanh toán thành công</h1>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Trang chính</a>
            <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
