<div
    class="bg-white dark:bg-[#161615] dark:text-[#EDEDEC] rounded border p-3 w-full lg:max-w-4xl max-w-[335px] shadow-lg">
    <div class="border-b flex justify-between">
        <div class="text-2xl">{{ $post->title }}</div>
        <div class="text-[silver] text-l">{{ $postTime() }}</div>
    </div>
    <div class="pt-2">{{ $postPreview() }}</div>
    <div class="text-right"><a href="{{ route('post', [$post->id]) }}" class="underline">Read More &raquo;</a></div>
</div>
