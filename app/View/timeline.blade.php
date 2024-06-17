<!-- resources/views/timeline.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Formulaire de création de post -->
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3" required maxlength="180"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Affichage des posts -->
            <div class="mt-4">
                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>{{ $post->body }}</p>
                            <small>{{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</small>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination des posts -->
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
