<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
                {{ __('Import Data') }}
            </h2>
            <x-link-button href="{{ route('data.create') }}" wire:navigate>
                {{ __('Add source') }}
            </x-link-button>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-celeste dark:bg-dm-brunswick_green overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-4">
                @if($data->count() == 0)
                    <h2 class="text-xl text-dark dark:text-dm-mint_green">{{ __('No sources added yet') }}</h2>
                    <p class="text-dark_green dark:text-dm-mint_green">{{ __('Add sources to get started!') }}</p>
                @else
                    <table class="w-full text-dark_green dark:text-dm-mint_green border-spacing-2">
                        <thead>
                            <tr>
                                <th class="text-start pb-2">{{ __('Name') }}</th>
                                <th class="text-start pb-2">{{ __('Ingredients Version') }}</th>
                                <th class="text-start pb-2 hidden sm:table-cell">{{ __('Recipes Version') }}</th>
                                <th class="text-start pb-2 hidden sm:table-cell">{{ __('Description') }}</th>
                                <th class="text-start pb-2 hidden sm:table-cell">{{ __('File type') }}</th>
                                <th class="text-start pb-2 hidden sm:table-cell">{{ __('URL') }}</th>
                                <th class="text-start pb-2">{{ __('Latest update') }}</th>
                                <th class="text-start pb-2 hidden sm:table-cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $source)
                                <tr class="border-t border-gray-300">
                                    <td class="py-2">{{ $source->name }}</td>
                                    <td class="py-2">{{ $source->ingredients_version }}</td>
                                    <td class="py-2 hidden sm:table-cell">{{ $source->recipes_version }}</td>
                                    <td class="py-2 hidden sm:table-cell">{{ $source->description }}</td>
                                    <td class="py-2 hidden sm:table-cell">{{ $source->file_type }}</td>
                                    <td class="py-2 hidden sm:table-cell"><a class="relative before:w-0 before:border-b before:border-dark_green dark:before:border-dm-mint_green before:block before:h-full before:bottom-0 before:absolute before:transition-td-a before:duration-500 hover:before:w-full hover:text-dark_green-600 dark:hover:text-dm-mint_green-400 hover:before:border-dark_green-600 dark:hover:before:border-dm-mint_green-400 transition duration-500" href="{{ $source->url }}" target="_blank">{{ $source->url }}</a></td>
                                    <td class="py-2">{{ $source->updated_at }}</td>
                                    <td class="py-2 hidden sm:table-cell">
                                        <button wire:click="createModal({{ $source->id }})" class="me-2"><i class="fa-solid fa-file-import"></i></button>
                                        <a href="{{ route('data.edit', ['id' => $source->id]) }}" class="me-2" wire:navigate><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button wire:click="delete({{ $source->id }})"><i class="fa-solid fa-trash text-red-500"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-dialog-modal wire:model="showModal">
                        <x-slot name="title">
                            {{ __('What do you wanna import') }}
                        </x-slot>
                        <x-slot name="content">
                            <p class="text-dark_green dark:text-dm-mint_green">{{ __('Choose the data you want to import') }}</p>
                        </x-slot>
                        <x-slot name="footer">
                            <x-secondary-button wire:click="$set('showModal', false)">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-link-button href="{{ route('data.import.recipes', ['id' => $modalId]) }}" class="ml-2" wire:navigate>
                                {{ __('Recipes') }}
                            </x-link-button>
                            <x-link-button href="{{ route('data.import.ingredients', ['id' => $modalId]) }}" class="ml-2" wire:navigate>
                                {{ __('Ingredients') }}
                            </x-link-button>
                        </x-slot>
                    </x-dialog-modal>
                @endif
            </div>
        </div>
    </div>
</div>
