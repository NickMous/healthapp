<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8']) }}>
    <div class="mt-5 md:mt-0 md:col-span-3">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5 bg-celeste dark:bg-dm-brunswick_green sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-celeste-600 dark:bg-dm-brunswick_green-400 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
