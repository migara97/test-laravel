@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-4">Edit Blog Post</h1>
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
