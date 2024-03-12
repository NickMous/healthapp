<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
                {{ __('Create Source') }}
            </h2>
        </div>
    </x-slot>
    <x-form-block submit="create">
        <x-slot:form>
            <x-validation-errors class="mb-4" :errors="$errors"/>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" :value="__('Name')" class="text-dark_green dark:text-dm-mint_green"/>
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="description" :value="__('Description - Optional')" class="text-dark_green dark:text-dm-mint_green"/>
                <x-textarea id="description" class="block mt-1 w-full" wire:model="description"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="url" :value="__('URL - optional')" class="text-dark_green dark:text-dm-mint_green"/>
                <x-input id="url" class="block mt-1 w-full" type="text" wire:model="url"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="file_type" :value="__('File type')" class="text-dark_green dark:text-dm-mint_green"/>
                <x-select id="file_type" class="block mt-1 w-full" wire:model="file_type" required>
                    <option value="">Select</option>
                    <option value="csv">CSV</option>
                </x-select>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="row_delimiter" :value="__('Row delimiter')" class="text-dark_green dark:text-dm-mint_green"/>
                <x-input id="row_delimiter" class="block mt-1 w-full" type="text" wire:model="row_delimiter" required/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="column_delimiter" :value="__('Column delimiter')" class="text-dark_green dark:text-dm-mint_green"/>
                <x-input id="column_delimiter" class="block mt-1 w-full" type="text" wire:model="column_delimiter" required/>
            </div>
        </x-slot:form>
        <x-slot:actions>
            <x-button class="ml-4">
                {{ __('Save') }}
            </x-button>
        </x-slot:actions>
    </x-form-block>
</div>
