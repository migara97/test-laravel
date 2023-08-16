@extends('layouts.app')

@section('content')
    <div class="row mt-3 mb-5">
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <h1 class="fw-bold">Blog Posts</h1>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">Create New Post</a>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 80vh;">
       
        
        
        
        <div class="row">
            <div class="col-md-1"></div>
            @foreach($posts as $post)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        @endforeach
        </div>
        

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
