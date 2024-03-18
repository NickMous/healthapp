<div>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="bg-celeste dark:bg-dm-brunswick_green overflow-hidden shadow-xl sm:rounded-lg p-4 flex items-center justify-center w-max">
            @if($notifications->count() == 0)
                <h2 class="text-xl text-dark dark:text-dm-mint_green font-bold">{{ __('No notifications yet') }}</h2>
            @else
                <table class="table table-auto text-dark_green dark:text-dm-mint_green">
                    <thead>
                    <tr>
                        <th class="text-start py-2">{{ __('Message') }}</th>
                        <th class="text-start py-2">{{ __('Datetime') }}</th>
                        <th class="text-start py-2">{{ __('Read') }}</th>
                        <th class="text-start py-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr class="border-t border-gray-300">
                            <td class="p-2">{{ $notification->data["message"] }}</td>
                            <td class="p-2">{{ $notification->created_at }}</td>
                            <td class="p-2">{{ $notification->read_at ? 'Yes' : 'No' }}</td>
                            <td class="p-2">
                                <x-button wire:click="markAsRead('{{ $notification->id }}')">Mark as read</x-button>
                                <x-danger-button wire:click="delete('{{ $notification->id }}')">Delete</x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
