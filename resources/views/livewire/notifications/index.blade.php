<div>
    <table>
        <thead>
        <tr>
            <th class="text-start py-2">{{ __('Message') }}</th>
            <th class="text-start py-2">{{ __('Datetime') }}</th>
            <th class="text-start py-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            <tr class="border-t border-gray-300">
                <td class="py-2">{{ $notification->data["message"] }}</td>
                <td class="py-2">{{ $notification->created_at }}</td>
                <td class="py-2">
                    <form wire:submit="markAsRead">
                        <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                        <input type="submit" value="Mark as read">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
