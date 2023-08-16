@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-4">Create New Blog Post</h1>
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
