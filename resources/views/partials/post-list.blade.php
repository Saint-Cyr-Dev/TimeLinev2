@if ($posts->count())
    @foreach ($posts as $post)
        <div class="mb-4">
            <div class="flex items-center">
                <div>
                    <h3 class="text-lg font-semibold">{{ $post->user->name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <p class="mt-2">{{ $post->body }}</p>
            <div class="mt-2">
                <form action="{{ route('posts.like', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-blue-500">
                        @if($post->likes->contains('user_id', auth()->id()))
                            Unlike
                        @else
                            Like
                        @endif
                    </button>
                </form>
                <span>{{ $post->likes->count() }} Like(s)</span>
            </div>
        </div>
        <hr class="my-4">
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@else
    <p>Aucun post pour le moment.</p>
@endif
