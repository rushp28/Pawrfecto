<!-- Product Category Edit/Create Page -->
<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            @if($action === 'create')
                {{ __('Create Product Category') }}
            @elseif($action === 'edit')
                {{ __('Edit Product Category') }}
            @endif
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Section Title and Description -->
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <x-section-title>
                        <x-slot name="title">
                            @if($action === 'create')
                                {{ __('Product Category Information') }}
                            @elseif($action === 'edit')
                                {{ __('Edit Product Category') }}
                            @endif
                        </x-slot>
                        <x-slot name="description">{{ __('Provide details about the product category.') }}</x-slot>
                    </x-section-title>

                    <!-- Form Container -->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST"
                              @if($action === 'create')
                                  action="{{ route('product-categories.store') }}"
                              @elseif($action === 'edit')
                                  action="{{ route('product-categories.update', $product_category->id) }}"
                            @endif>
                            @csrf
                            @if($action === 'edit')
                                @method('PUT')
                            @endif

                            <!-- Product Category Information Section -->
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Parent Product Category Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="parent_product_category_id" value="{{ __('Parent Product Category') }}" />
                                        <select id="parent_product_category_id" name="parent_product_category_id" class="block w-full mt-1">
                                            @if($action === 'edit')
                                                <option value="{{ isset($parent_product_category) ? $parent_product_category->id : null }}">
                                                    {{ isset($parent_product_category) ? $parent_product_category->name : 'Select Parent Product Category' }}
                                                </option>
                                            @else
                                                <option value="">
                                                    {{ __('Select Parent Product Category') }}
                                                </option>
                                            @endif
                                            @foreach ($parent_product_categories as $parent_product_category_option)
                                                <option value="{{ $parent_product_category_option->id }}"
                                                        @if($action === 'edit' && $parent_product_category_option->parent_product_category_id === $parent_product_category_option->id)
                                                            selected
                                                    @endif>{{ $parent_product_category_option->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error for="parent_product_category_id" class="mt-2" />
                                    </div>

                                    <!-- Product Category Name Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="name" value="{{ __('Product Category Name') }}" />
                                        <x-input id="name" name="name" type="text" class="block w-full mt-1"
                                                 value="{{ $action === 'edit' ? $product_category->name : old('name') }}" required maxlength="128" />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>

                                    <!-- Product Category Description Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="description" value="{{ __('Product Category Description') }}" />
                                        <x-input id="description" name="description" type="text" class="block w-full mt-1"
                                                 value="{{ $action === 'edit' ? $product_category->description : old('description') }}" maxlength="256" />
                                        <x-input-error for="description" class="mt-2" />
                                    </div>

                                    <!-- Product Category Status Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="is_active" value="{{ __('Status') }}" />
                                        <select id="is_active" name="is_active" class="block w-full mt-1">
                                            <option value="1"
                                                    @if($action === 'edit' && $product_category->is_active === 1)
                                                        selected
                                                @endif>{{ __('Active') }}</option>
                                            <option value="0"
                                                    @if($action === 'edit' && $product_category->is_active === 0)
                                                        selected
                                                @endif>{{ __('Inactive') }}</option>
                                        </select>
                                        <x-input-error for="is_active" class="mt-2" />
                                    </div>

                                    <!-- Form Submission Button and Status Message -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <div class="flex items-center justify-end">
                                            <!-- Status Message -->
                                            @if (session('status'))
                                                <div class="mr-4 text-green-600" x-data="{ shown: true }" x-show="shown" x-init="setTimeout(() => { shown = false; }, 5000)">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <!-- Save Button -->
                                            <x-button wire:loading.attr="disabled" wire:target="photo">
                                                {{ __('Save') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
