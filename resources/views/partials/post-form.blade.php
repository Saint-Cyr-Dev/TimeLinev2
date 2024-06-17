<form action="{{ route('posts.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
        <label for="body" class="sr-only">Post</label>
        <textarea name="body" id="body" rows="3" class="w-full p-4 border-2 border-gray-300 rounded-md" placeholder="Quoi de neuf ?"></textarea>
        @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Publier</button>
    </div>
</form>
