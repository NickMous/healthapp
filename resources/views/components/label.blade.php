@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-dark_green-600 dark:text-dm-mint_green-400']) }}>
    {{ $value ?? $slot }}
</label>
