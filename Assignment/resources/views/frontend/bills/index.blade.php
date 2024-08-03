{{-- extends: chỉ định layout được sử dụng --}}
@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <h4 class="card-header">Đơn Hàng Của Bạn</h4>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>SHIPPING</th>
                <th>CITY</th>
                <th>NAME</th>
                <th>PRODUCT</th>
                <th>TOTAL</th>
                <th>CREATED</th>
                <th>STATUS</th>
                <th>MODULE</th>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->shipping }}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>${{ $item->total }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            {{-- {{ $item->status }} --}}
                            <span id="status-{{ $item->id }}">{{ $item->status }}</span>
                        </td>
                        <td>
                            @if ($item->status == 'Pending')
                                <form action="{{ route('order.update', $item) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn không ?)"
                                        class="btn">Hủy Đơn Hàng</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
