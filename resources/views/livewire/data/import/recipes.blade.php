<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
                {{ __('Import data
') }}
            </h2>
            <x-link-button href="{{ route('data.import') }}" wire:navigate>
                {{ __('Back') }}
            </x-link-button>
        </div>
    </x-slot>
    <x-form-block submit="fileChosen">
        <x-slot:form>
            <div class="flex flex-col space-y-4 col-start-1 col-end-7">
                <div class="flex flex-col space-y-2">
                    <x-label for="file" :value="__('File')"></x-label>
                    <label for="file" class="flex items-center justify-center h-12 w-max px-4 text-sm text-white bg-dark_green rounded-lg cursor-pointer hover:bg-dark_green-600 transition">
                        <span class="text-base text-dm-mint_green">{{ $file ? $file->getClientOriginalName() : __('Upload a file') }}</span>
                    </label>
                    <x-input id="file" type="file" wire:model="file" class="hidden"/>
                    <x-input-error for="file" class="mt-2"/>
                </div>
            </div>
        </x-slot:form>
        <x-slot:actions>
            <x-button class="ml-4">
                {{ __('Start') }}
            </x-button>
        </x-slot:actions>
    </x-form-block>
    @if(count($columns) > 0)
        <x-form-block submit="queueImport" class="pt-4" x-show="$wire.columns">
            <x-slot:form>
                <div class="flex flex-row flex-wrap col-start-1 col-end-7">
                    <div class="flex flex-col space-y-2 py-2 px-3">
                        <x-label for="name" :value="__('Name')"></x-label>
                        <x-select id="name" wire:model="name">
                            <option value="">Select</option>
                            @foreach($columns as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="name" class="mt-2"/>
                    </div>
                    <div class="flex flex-col space-y-2 py-2 px-3">
                        <x-label for="ingredients" :value="__('Ingredients')"></x-label>
                        <x-select id="ingredients" wire:model="ingredients">
                            <option value="">Select</option>
                            @foreach($columns as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="ingredients" class="mt-2"/>
                    </div>
                    <div class="flex flex-col space-y-2 py-2 px-3">
                        <x-label for="amount" :value="__('Amount')"></x-label>
                        <x-select id="amount" wire:model="amount">
                            <option value="">Select</option>
                            @foreach($columns as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="amount" class="mt-2"/>
                    </div>
                    <div class="flex flex-col space-y-2 py-2 px-3">
                        <x-label for="version" :value="__('Version')"></x-label>
                        <x-select id="version" wire:model="version">
                            <option value="">Select</option>
                            @foreach($columns as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="version" class="mt-2"/>
                    </div>
                </div>
            </x-slot:form>
            <x-slot:actions>
                <x-button class="ml-4">
                    {{ __('Import') }}
                </x-button>
            </x-slot:actions>
        </x-form-block>
    @endif
</div>
