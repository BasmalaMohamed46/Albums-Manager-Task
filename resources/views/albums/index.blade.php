@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Albums</h1>
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-4">Create Album</a>
    <div class="row">
        @forelse ($albums as $album)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $album->name }}</h2>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if ($album->pictures->count() > 0)
                                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group mb-2">
                                            <select name="action" class="form-control-sm mr-2" required>
                                                <option value="" disabled selected>Choose action</option>
                                                <option value="delete">Delete all pictures</option>
                                                <option value="move">Move pictures to another album</option>
                                            </select>
                                            <select name="target_album_id" class="form-control-sm mr-2">
                                                <option value="" disabled selected>Choose target album</option>
                                                @foreach ($albums as $targetAlbum)
                                                    @if ($targetAlbum->id != $album->id)
                                                        <option value="{{ $targetAlbum->id }}">{{ $targetAlbum->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-danger btn-sm mt-2">Delete Album</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete Album</button>
                                    </form>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info mr-2 mb-2">View</a>
                                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning mb-2">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    No albums found.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
