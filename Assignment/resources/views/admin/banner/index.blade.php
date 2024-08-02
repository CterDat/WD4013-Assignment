{{-- extends: chỉ định layout được sử dụng --}}
@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <h4 class="card-header">Danh Sách Banner</h4>
    <div class="card-body">
        <a href="{{ route('banner.create') }}" class="btn btn-success">Thêm Banner</a>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>BANNER</th>
                <th>CREATE</th>
                <th>UPDATE</th>
                <th>MODULE</th>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img src="{{ Storage::url($item->image) }}" alt="" width="100" height="150"></td>
                        <td>{{ $item->created_at}}</td>
                        <td>{{ $item->updated_at}}</td>
                        <td>
                            <div class="">
                                <div class="">
                                    <form action="{{ route('banner.destroy', $item) }}" method="post">
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
