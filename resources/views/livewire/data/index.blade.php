<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
                {{ __('Data') }}
            </h2>
            <x-link-button href="{{ route('data.import') }}" wire:navigate>
                {{ __('Import Data') }}
            </x-link-button>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-celeste dark:bg-dm-brunswick_green overflow-hidden shadow-xl sm:rounded-lg">
            @if($data->count() == 0)
                <div class="p-4">
                    <h2 class="text-xl text-dark dark:text-dm-mint_green">{{ __('No data added yet') }}</h2>
                    <p class="text-dark_green dark:text-dm-mint_green">{{ __('Import some data to get started!') }}</p>
                </div>
            @else

            @endif
        </div>
    </div>
</div>
