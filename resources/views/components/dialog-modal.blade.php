@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-dark_green dark:text-dm-mint_green">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-dark_green dark:text-dm-mint_green">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-celeste-600 dark:bg-dm-brunswick_green-400 text-end">
        {{ $footer }}
    </div>
</x-modal>
