{{-- extends: chỉ định layout được sử dụng --}}
@extends('layout.master')
@section('content')
    {{-- <div class="card">
        <h4 class="card-header">Danh Sách Sản Phẩm</h4>
        <div class="card-body">
            <a href="{{ route('sanpham.create') }}" class="btn btn-success">Thêm sản phẩm</a>
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>HÌNH ẢNH</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>NGÀY NHẬP</th>
                    <th>MÔ TẢ</th>
                    <th>DANH MỤC</th>
                    <th>HÀNH ĐỘNG</th>
                </thead>
                <tbody>
                    @foreach ($listSanPham as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ Storage::url($item->hinh_anh) }}" alt="" width="100" height="150">
                            </td>
                            <td>{{ $item->ten_san_pham }}</td>
                            <td>{{ $item->gia }}</td>
                            <td>{{ $item->so_luong }}</td>
                            <td>{{ $item->ngay_nhap }}</td>
                            <td>{{ $item->mo_ta }}</td>
                            <td>{{ $item->ten_danh_muc }}</td>
                            <td>
                                <div class="">
                                    <div class=" mb-2">
                                        <a href="{{ route('sanpham.edit', $item->id) }}">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </div>
                                    <div class="">
                                        <form action="{{ route('sanpham.destroy', $item->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('ban co muon xoa khong?')"
                                                class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection
