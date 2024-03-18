@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-sea_green dark:border-dm-aquamarine text-start text-base font-medium text-dark_green dark:text-dm-mint_green bg-sea_green/20 dark:bg-dm-aquamarine-900/30 focus:outline-none focus:text-dark_green dark:focus:text-dm-mint_green focus:bg-sea_green dark:focus:bg-dm-aquamarine/70 focus:border-sea_green dark:focus:border-dm-dark_green transition duration-150 ease-in-out transition'
                : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-dark_green dark:text-dm-mint_green hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-dark_green dark:focus:text-dm-mint_green focus:bg-sea_green dark:focus:bg-dm-aquamarine/30 focus:border-sea_green dark:focus:border-dm-aquamarine transition duration-150 ease-in-out';
@endphp

<div x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <button type="button" {{ $attributes->merge(['class' => $classes]) }} @click="open = !open">
        {{ $trigger }}
    </button>

    <div class="mt-2 ms-4 focus:outline-none overflow-hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" x-show="open"
         x-transition:enter="transition-dropdown ease-in-out duration-300"
         x-transition:enter-start="max-h-0 !mt-0"
         x-transition:enter-end="max-h-[80px] !mt-2"
         x-transition:leave="transition-dropdown ease-in-out duration-300"
         x-transition:leave-start="max-h-[80px] !mt-2"
         x-transition:leave-end="max-h-0 !mt-0"
    >
        {{ $content }}
    </div>
</div>
