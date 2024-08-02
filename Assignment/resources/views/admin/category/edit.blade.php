@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tên:</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
        </div>
        <input type="submit" value="Sửa" class="btn btn-success">
    </form>
@endsection
