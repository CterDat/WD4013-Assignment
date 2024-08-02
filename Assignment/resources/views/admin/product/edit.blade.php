@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <form action="{{ route('admin.update', $data) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tên:</label>
            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Giá:</label>
            <input type="number" class="form-control" name="price" value="{{ $data->price }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Danh mục:</label>
            <select name="category_id" class="form-select">
                @foreach ($category as $item)
                    <option value="{{ $item->category_id }}">{{ $item->category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ảnh:</label>
            <input type="file" class="form-control" name="image">
            <img src="{{ Storage::url($data->image) }}" alt="" width="150px">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mô tả:</label>
            <textarea name="description" rows="3" class="form-control" placeholder="{{ $data->description }}"></textarea>
        </div>
        <input type="submit" value="Sửa" class="btn btn-success">
    </form>
@endsection
