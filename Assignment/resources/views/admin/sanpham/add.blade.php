{{-- extends: chỉ định layout được sử dụng
@extends('layout.admin')
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm sản phẩm</h4>
        <div class="card-body">
            <form action="{{ route('sanpham.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" id="" name="hinh_anh">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="" name="ten_san_pham">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" min="1" name="so_luong">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giá sản phẩm:</label>
                    <input type="number" class="form-control" min="1" name="gia">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ngày nhập:</label>
                    <input type="date" class="form-control" id="" name="ngay_nhap">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả:</label>
                    <textarea name="mo_ta" rows="3" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Danh mục:</label>
                    <select name="danh_muc_id" class="form-select">
                        @foreach ($danh_mucs as $item)
                            <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection --}}
