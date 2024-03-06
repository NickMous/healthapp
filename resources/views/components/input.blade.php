@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-celeste-700 dark:border-dm-brunswick_green-400 bg-celeste-700 dark:bg-dm-brunswick_green-300 dark:text-dm-mint_green text-dark_green focus:border-aquamarine dark:focus:border-dm-accent-aquamarine-300 focus:ring-aquamarine dark:focus:ring-dm-accent-aquamarine-300 rounded-md shadow-sm']) !!}>
