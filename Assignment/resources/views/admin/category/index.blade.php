{{-- extends: chỉ định layout được sử dụng --}}
@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <h4 class="card-header">Danh Sách Sản Phẩm</h4>
    <div class="card-body">
        <a href="{{ route('category.create') }}" class="btn btn-success">Thêm sản phẩm</a>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>MODULE</th>
            </thead>
            <tbody>
                @foreach ($categories as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="">
                                <div class=" mb-2">
                                    <a href="{{ route('category.edit', $item) }}">
                                        <button class="btn btn-warning">Sửa</button>
                                    </a>
                                </div>
                                <div class="">
                                    <form action="{{ route('category.destroy', $item) }}" method="post">
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
    </div>
@endsection
