@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Create Album</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('albums.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Album Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
