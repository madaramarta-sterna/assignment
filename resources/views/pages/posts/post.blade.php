@extends('layout')

@section('content')
    <x-message></x-message>
    <div class="flex flex-col items-center w-full transition-opacity opacity-100 duration-750 starting:opacity-0 gap-[15px]">
        <x-post-view :post="$post"></x-post-view>
    </div>

    <div class="border-b-1 w-full lg:max-w-4xl max-w-[335px] text-3xl p-1 flex justify-between flex-wrap">
        <div>Comments</div>
        <div>
            <a onclick="toggleCommentForm()" class="cursor-pointer addComment inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Add Comment
            </a>
        </div>
    </div>

    <div class="duration-750 transition-[height] overflow-hidden w-full lg:max-w-4xl max-w-[335px] {{ $errors->any()?'visibleForm':''  }}" id="commentForm">
        <x-comment-form></x-comment-form>
    </div>

    <div class="flex flex-col items-center w-full transition-opacity opacity-100 duration-750 starting:opacity-0 gap-[15px]">
        @foreach($comments as $comment)
            <x-comment :comment="$comment"></x-comment>
        @endforeach
        {{ $comments->links() }}
    </div>
@endsection
