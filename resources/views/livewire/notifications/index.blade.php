<div>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center flex-col w-max">
        @if($notifications->count() == 0)
            <h2 class="text-xl text-dark dark:text-dm-mint_green font-bold">{{ __('No notifications yet') }}</h2>
        @else
            @if($unreadNotifications->count() > 0)
            <div class="flex items-center justify-between w-full pb-2">
                <h3 class="font-semibold text-3xl text-dark_green dark:text-dm-mint_green leading-tight w-full mb-2">
                    {{ __('Unread') }}
                </h3>
                <div class="w-full flex justify-end">
                    <x-button wire:click="markAllAsRead" class="me-2">{{ __('Mark all as read') }}</x-button>
                    <x-danger-button wire:click="deleteAll">{{ __('Delete all') }}</x-danger-button>
                </div>
            </div>
            <div class="bg-celeste dark:bg-dm-brunswick_green overflow-hidden shadow-xl sm:rounded-lg p-4 flex items-center justify-center flex-col mb-12 w-full">
                <table class="table table-auto text-dark_green dark:text-dm-mint_green w-full">
                    <thead>
                    <tr>
                        <th class="text-start py-2">{{ __('Message') }}</th>
                        <th class="text-start py-2">{{ __('Datetime') }}</th>
                        <th class="text-start py-2">{{ __('Read') }}</th>
                        <th class="text-start py-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($unreadNotifications as $notification)
                        <tr class="border-t border-gray-300">
                            <td class="p-2"><a href="{{ $notification->data["url"] }}" class="relative before:w-0 before:border-b before:border-dark_green dark:before:border-dm-mint_green before:block before:h-full before:bottom-0 before:absolute before:transition-td-a before:duration-500 hover:before:w-full hover:text-dark_green-600 dark:hover:text-dm-mint_green-400 hover:before:border-dark_green-600 dark:hover:before:border-dm-mint_green-400 transition duration-500" wire:navigate>{{ $notification->data["message"] }}</a></td>
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
            </div>
            @endif
            <div class="flex items-center justify-between w-full pb-2">
                <h3 class="font-semibold text-3xl text-dark_green dark:text-dm-mint_green leading-tight w-full mb-2">
                    {{ __('All') }}
                </h3>
                <div class="w-full flex justify-end">
                    <x-button wire:click="markAllAsRead" class="me-2">{{ __('Mark all as read') }}</x-button>
                    <x-danger-button wire:click="deleteAll">{{ __('Delete all') }}</x-danger-button>
                </div>
            </div>
            <div class="bg-celeste dark:bg-dm-brunswick_green overflow-hidden shadow-xl sm:rounded-lg p-4 flex items-center justify-center flex-col w-full">
                <table class="table table-auto text-dark_green dark:text-dm-mint_green w-full">
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
                            <td class="p-2"><a href="{{ $notification->data["url"] }}" class="relative before:w-0 before:border-b before:border-dark_green dark:before:border-dm-mint_green before:block before:h-full before:bottom-0 before:absolute before:transition-td-a before:duration-500 hover:before:w-full hover:text-dark_green-600 dark:hover:text-dm-mint_green-400 hover:before:border-dark_green-600 dark:hover:before:border-dm-mint_green-400 transition duration-500" wire:navigate>{{ $notification->data["message"] }}</a></td>
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
            </div>
        @endif
    </div>
</div>
