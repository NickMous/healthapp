<label class="inline-flex items-center mb-5 cursor-pointer">
    <input type="checkbox" value="" class="sr-only peer" {{ $attributes }}>
    <div class="relative w-11 h-6 bg-celeste-700 dark:bg-dm-brunswick_green-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-teal-500 after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-sea_green dark:after:bg-dm-mint_green after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 dark:peer-checked:bg-dm-brunswick_green-600 peer-checked:bg-sea_green-300 transition"></div>
    <span class="ms-3 text-sm font-medium text-dark_green-600 dark:text-dm-mint_green-400">{{ $slot }}</span>
</label>
