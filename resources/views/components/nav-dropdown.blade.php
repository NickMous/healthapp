@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-mint_green dark:bg-dm-dark_green', 'dropdownClasses' => '', 'active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-sea_green dark:border-dm-aquamarine text-sm font-medium leading-5 text-dark_green dark:text-dm-mint_green focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out relative'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-dark_green dark:text-dm-mint_green hover:text-aquamarine dark:hover:text-dm-accent-aquamarine hover:border-aquamarine dark:hover:border-dm-accent-aquamarine focus:outline-none focus:text-dark_green dark:focus:text-dm-brunswick_green focus:border-sea_green dark:focus:border-dm-brunswick_green transition duration-150 ease-in-out relative';
@endphp


@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'none':
        case 'false':
            $alignmentClasses = '';
            break;
        case 'right':
        default:
            $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp
<div x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" {{ $attributes->merge(['class' => $classes]) }}>
    <button @click="open = ! open" class="inline-flex items-center">
        {{ $trigger }}
        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
        </svg>
    </button>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }} {{ $dropdownClasses }} top-14"
         style="display: none;"
         @click="open = false">
        <div class="ring-1 ring-black dark:ring-white/5 ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
