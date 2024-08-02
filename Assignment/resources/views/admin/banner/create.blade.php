@extends('layouts.app')
@section('content')
    <?php $showBanner = false; ?>
    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Banner:</label>
            <input type="file" class="form-control" name="image">
        </div>
        <input type="submit" value="Thêm" class="btn btn-success">
    </form>
@endsection
