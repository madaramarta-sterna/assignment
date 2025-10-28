<div
    class="bg-white dark:bg-[#161615] dark:text-[#EDEDEC] rounded border p-3 w-full lg:max-w-4xl max-w-[335px]  shadow-lg">
    <div class="border-b flex justify-between">
        <div class="text-2xl">{{ $post->title }}</div>
        <div class="text-[silver] text-l">{{ $postTime() }}</div>
    </div>
    <div class="whitespace-pre-wrap">
        @if($post->post_image)
            <div class="float-left mb-3 mr-3">
            <img id='currentImagee' src="{{$post->post_image}}"
                 class="max-w-75 max-h-50 shadow-lg"/></div>
        @endif
        {{ $post->content }}
        <p class="clear-both"></p>
    </div>
    <div class="text-right"><a href="{{ route('posts') }}" class="underline">&laquo; Back to list</a></div>
</div>
