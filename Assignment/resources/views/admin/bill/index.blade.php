{{-- extends: chỉ định layout được sử dụng --}}
@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <h4 class="card-header">Danh Sách Bill</h4>
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
                                <form action="{{ route('bill.update', $item) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn không ?)"
                                        class="btn">Shipped</button>
                                </form>
                                {{-- <button id="ship-btn-{{ $item->id }}" onclick="shipOrder({{ $item->id }})">Đã Giao
                                    Hàng</button> --}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        function shipOrder(orderId) {
            // Cập nhật trạng thái trong cơ sở dữ liệu
            updateOrderStatus(orderId, 'Shipped');

            // Cập nhật giao diện
            var statusSpan = document.getElementById('status-' + orderId);
            statusSpan.textContent = 'Shipped';

            var shipButton = document.getElementById('ship-btn-' + orderId);
            shipButton.style.display = 'none';
        }

        function updateOrderStatus(orderId, newStatus) {
            // Gửi yêu cầu AJAX đến server để cập nhật trạng thái đơn hàng
            fetch('{{ route('orders.update-status') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        orderId,
                        newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Trạng thái đơn hàng đã được cập nhật:', data);
                })
                .catch(error => {
                    console.error('Lỗi khi cập nhật trạng thái đơn hàng:', error);
                });
        }
    </script>
@endsection
