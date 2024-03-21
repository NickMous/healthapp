<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-4xl text-dark_green dark:text-dm-mint_green leading-tight">
                {{ __('Import ingredients') }}
            </h2>
            <x-link-button href="{{ route('data.import') }}" wire:navigate>
                {{ __('Back') }}
            </x-link-button>
        </div>
    </x-slot>
    <x-form-block submit="filechosen">
        <x-slot:form>
            <div class="flex flex-col space-y-4 col-start-1 col-end-7">
                <div class="flex flex-col space-y-2">
                    <x-label for="file" :value="__('File')"></x-label>
                    <label for="file" class="flex items-center justify-center w-max h-12 px-4 text-sm text-white bg-dark_green rounded-lg cursor-pointer hover:bg-dark_green-600 transition">
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
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="name" :value="__('Name')"></x-label>
                    <x-select id="name" wire:model="name">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="name" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="foodgroup" :value="__('Food group')"></x-label>
                    <x-select id="foodgroup" wire:model="foodgroup">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="foodgroup" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="serving_g" :value="__('Serving size (g)')"></x-label>
                    <x-select id="serving_g" wire:model="serving_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="serving_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="calories" :value="__('Calories (kcal)')"></x-label>
                    <x-select id="calories" wire:model="calories">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="calories" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="protein_g" :value="__('Protein (g)')"></x-label>
                    <x-select id="protein_g" wire:model="protein_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="protein_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="fat_g" :value="__('Fat (g)')"></x-label>
                    <x-select id="fat_g" wire:model="fat_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="fat_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="water_g" :value="__('Water (g)')"></x-label>
                    <x-select id="water_g" wire:model="water_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="water_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="fiber_g" :value="__('Fiber (g)')"></x-label>
                    <x-select id="fiber_g" wire:model="fiber_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="fiber_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="sugar_g" :value="__('Sugar (g)')"></x-label>
                    <x-select id="sugar_g" wire:model="sugar_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="sugar_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="carbohydrates_g" :value="__('Carbohydrates (g)')"></x-label>
                    <x-select id="carbohydrates_g" wire:model="carbohydrates_g">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="carbohydrates_g" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
                    <x-label for="notes" :value="__('Notes')"></x-label>
                    <x-select id="notes" wire:model="notes">
                        <option value="">Select</option>
                        @foreach($columns as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="notes" class="mt-2"/>
                </div>
                <div class="flex flex-col space-y-2 py-2 px-3 ">
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
