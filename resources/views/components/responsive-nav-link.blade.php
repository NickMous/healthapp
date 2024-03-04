@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-sea_green dark:border-dm-aquamarine text-start text-base font-medium text-dark_green dark:text-dm-mint_green bg-sea_green/20 dark:bg-dm-aquamarine-900/30 focus:outline-none focus:text-dark_green dark:focus:text-dm-mint_green focus:bg-sea_green dark:focus:bg-dm-aquamarine/70 focus:border-sea_green dark:focus:border-dm-dark_green transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-dark_green dark:text-dm-mint_green hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-dark_green dark:focus:text-dm-mint_green focus:bg-sea_green dark:focus:bg-dm-aquamarine/30 focus:border-sea_green dark:focus:border-dm-aquamarine transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>
