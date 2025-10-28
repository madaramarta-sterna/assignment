@extends('admin.layout')

@section('content')
    <x-message></x-message>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="border-b-2">#</th>
            <th class="border-b-2">Title</th>
            <th class="border-b-2">Comments</th>
            <th class="border-b-2">Created</th>
            <th class="border-b-2">Actions
                <x-admin.action-button action="create" :data="$emptyPost"></x-admin.action-button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <x-admin.post-list-item :post="$post"></x-admin.post-list-item>
        @endforeach
        </tbody>
    </table>
@endsection
