{{-- extends: chỉ định layout được sử dụng --}}
@extends('layout.master')
@section('frontend-product')
    <?php $showBanner = false; ?>
    <h4 class="card-header">Danh Sách Sản Phẩm</h4>
    <div class="card-body">
        <a href="{{ route('admin.create') }}" class="btn btn-success">Thêm sản phẩm</a>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>TÊN SẢN PHẨM</th>
                <th>GIÁ</th>
                <th>DANH MỤC</th>
                <th>HÌNH ẢNH</th>
                <th>MÔ TẢ</th>
                <th>NGÀY NHẬP</th>
                <th>NGÀY CẬP NHẬT</th>
                <th>HÀNH ĐỘNG</th>
            </thead>
            <tbody>
                @foreach ($listClothes as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <img src="{{ Storage::url($item->image) }}" alt="" width="100" height="150">
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            {{-- <div class="">
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
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
