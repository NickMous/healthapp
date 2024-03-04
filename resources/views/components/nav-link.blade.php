@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-sea_green dark:border-dm-aquamarine text-sm font-medium leading-5 text-dark_green dark:text-dm-mint_green focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-dark_green dark:text-dm-mint_green hover:text-aquamarine dark:hover:text-dm-accent-aquamarine hover:border-aquamarine dark:hover:border-dm-accent-aquamarine focus:outline-none focus:text-dark_green dark:focus:text-dm-brunswick_green focus:border-sea_green dark:focus:border-dm-brunswick_green transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>
