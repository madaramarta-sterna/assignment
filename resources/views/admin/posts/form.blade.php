@extends('admin.layout')

@section('content')
    <div class="w-full lg:max-w-4xl max-w-[335px]">
        <x-message></x-message>
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="title" value="{{ $post?->title??old('author') }}"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Post Title" required>
            <x-form-error errorName="title" :errorBag="$errors"></x-form-error>

            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
            <textarea id="content" rows="4" name="content"
                      class="block p-2.5 w-full text-sm h-100 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Post Content" required>{{ $post?->content??old('content') }}</textarea>
            <x-form-error errorName="content" :errorBag="$errors"></x-form-error>

            @if($post->post_image)
                <label for="currentImage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Image</label>

                <img id='currentImagee' src="{{$post->post_image}}" class="max-w-50 max-h-50"/>
            @endif

            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image" id="image"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Post Image" accept="image/png,image/jpeg">
            <x-form-error errorName="image" :errorBag="$errors"></x-form-error>

            <input type="submit"
                   class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 cursor-pointer float-right mt-2 inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                   value="Save"/>
            <a href="javascript:history.go(-1)"
               class="cursor-pointer mr-2 float-right mt-2 inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
            >&laquo; Back</a>
        </form>

        @if($post->comments->count())
            <div class="border-b-1 w-full lg:max-w-4xl max-w-[335px] text-3xl p-1 flex justify-between flex-wrap">
                <div>Comments</div>
            </div>
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="border-b-2">#</th>
                    <th class="border-b-2">Author</th>
                    <th class="border-b-2">Created</th>
                    <th class="border-b-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <x-admin.comment-list-item :comment="$comment"></x-admin.comment-list-item>
                @endforeach
                </tbody>
            </table>
            {{ $comments->links() }}
        @endif
    </div>
@endsection
