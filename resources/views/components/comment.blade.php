<div
    class="bg-white dark:bg-[#161615] dark:text-[#EDEDEC] rounded border p-3 w-full lg:max-w-4xl max-w-[335px] shadow-lg">
    <div class="border-b flex justify-between">
        <div class="text-xl">Author: <strong>{{ $comment->author }}</strong></div>
        <div class="text-[silver] text-l">{{ $commentTime() }}</div>
    </div>
    <div class="pt-2">{{ $comment->content }}</div>
</div>
