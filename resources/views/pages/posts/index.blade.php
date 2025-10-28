@extends('layout')

@section('content')
    <div
        class="flex flex-col items-center w-full transition-opacity opacity-100 duration-750 starting:opacity-0 gap-[15px]">
        @forelse($posts as $post)
            <x-post-listed :post="$post"></x-post-listed>
            @empty
                No Posts Added
        @endforelse
    </div>
    <div>{{ $posts->links() }}</div>
@endsection
