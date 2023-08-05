@props(['post'])
<article class="bg-white shadow rounded-lg overflow-hidden mb-6">
    <a href="{{ route('posts.show', $post) }}">
        @if ($post->image)
            <img class="w-full h-64 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
        @else
            <img class="w-full h-64 object-cover object-center"
                src="https://cdn.pixabay.com/photo/2023/01/22/13/46/swans-7736415_1280.jpg"
                alt="">
        @endif
    </a>
    <div class="p-6">
        <h2 class="text-lg font-bold mb-2">
            <a href="{{ route('posts.show', $post) }}" class="hover:text-gray-600">
                {{ $post->name }}
            </a>
        </h2>
        <div class="text-base text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        <div>
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}"
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{ $tag->name }}
                </a>
            @endforeach
        </div>
        <div class="text-sm text-gray-500">
            <i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}
        </div>
    </div>
</article>
