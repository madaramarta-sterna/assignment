<tr class="hover:bg-gray-100">
    <td class="text-center text-nowrap pl-4 pr-4">{{ $post->id }}</td>
    <td class="text-center w-full">{{ $post->title }}</td>
    <td class="text-center text-nowrap pl-4 pr-4">{{ $post->comments->count() }}</td>
    <td class="text-center text-nowrap pl-4 pr-4">{{ $postTime(true) }}</td>
    <td class="flex flex-nowrap">
        <x-admin.action-button action="view" :data="$post"></x-admin.action-button>
        <x-admin.action-button action="edit" :data="$post"></x-admin.action-button>
        <x-admin.action-button action="delete" :data="$post"></x-admin.action-button>
    </td>
</tr>
