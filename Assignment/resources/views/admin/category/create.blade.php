@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tên:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <input type="submit" value="Thêm" class="btn btn-success">
    </form>
@endsection
