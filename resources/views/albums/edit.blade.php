@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Album</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('albums.update', $album) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Album Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $album->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
