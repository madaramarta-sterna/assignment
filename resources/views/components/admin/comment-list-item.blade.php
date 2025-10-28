<tr class="hover:bg-gray-100">
    <td>{{ $comment->id }}</td>
    <td>{{ $comment->author }}</td>
    <td>{{ $commentTime(true) }}</td>
    <td>
        <x-admin.action-button action="delete" :data="$comment"></x-admin.action-button>
    </td>
</tr>
