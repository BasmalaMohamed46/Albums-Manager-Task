@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $album->name }}</h1>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pictures.store', $album) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Picture Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="file">Upload Picture</label>
            <input type="file" class="form-control-file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <div class="row mt-4">
        @foreach ($album->pictures as $picture)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ Storage::url($picture->file_path) }}" class="card-img-top" alt="{{ $picture->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $picture->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
