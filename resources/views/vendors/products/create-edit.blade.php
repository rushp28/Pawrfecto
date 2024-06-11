<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            @if($action === 'create')
                {{ __('Create Product') }}
            @elseif($action === 'edit')
                {{ __('Edit Product') }}
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
                                {{ __('Product Information') }}
                            @elseif($action === 'edit')
                                {{ __('Edit Product') }}
                            @endif
                        </x-slot>
                        <x-slot name="description">{{ __('Provide details about the product.') }}</x-slot>
                    </x-section-title>

                    <!-- Form Container -->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST"
                              @if($action === 'create')
                                  action="{{ route('products.store') }}"
                              @elseif($action === 'edit')
                                  action="{{ route('products.update', $product->id) }}"
                            @endif>
                            @csrf
                            @if($action === 'edit') @method('PUT') @endif

                            <!-- Product Information Section -->
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Product Category ID Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="product_category_id" value="{{ __('Product Category ID') }}" />
                                        <select id="product_category_id" name="product_category_id" class="block w-full mt-1" required>
                                            <option value="">{{ __('Select Product Category') }}</option>
                                            @foreach ($product_categories as $product_category)
                                                <option value="{{ $product_category->id }}"
                                                        @if($action === 'edit' && $product->product_category_id === $product_category->id)
                                                            selected
                                                    @endif>{{ $product_category->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error for="product_category_id" class="mt-2" />
                                    </div>

                                    <!-- Product Name Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="name" value="{{ __('Product Name') }}" />
                                        <x-input id="name" name="name" type="text" class="block w-full mt-1"
                                                 value="{{ $action === 'edit' ? $product->name : old('name') }}" required maxlength="128" />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>

                                    <!-- Product Description Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="description" value="{{ __('Product Description') }}" />
                                        <x-input id="description" name="description" type="text" class="block w-full mt-1"
                                                 value="{{ $action === 'edit' ? $product->description : old('description') }}" maxlength="256" />
                                        <x-input-error for="description" class="mt-2" />
                                    </div>

                                    <!-- Product Price Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="price" value="{{ __('Price') }}" />
                                        <x-input id="price" name="price" type="number" step="0.01" class="block w-full mt-1"
                                                 value="{{ $action === 'edit' ? $product->price : old('price') }}" required />
                                        <x-input-error for="price" class="mt-2" />
                                    </div>

                                    <!-- Discounted Price Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="discounted_price" value="{{ __('Discounted Price') }}" />
                                        <x-input id="discounted_price" name="discounted_price" type="number" step="0.01" class="block w-full mt-1"  value="{{ $action === 'edit' ? $product->discounted_price : old('discounted_price') }}" />
                                        <x-input-error for="discounted_price" class="mt-2" />
                                    </div>

                                    <!-- Product Quantity Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="quantity" value="{{ __('Quantity') }}" />
                                        <x-input id="quantity" name="quantity" type="number" class="block w-full mt-1"
                                                 value="{{ $action === 'edit' ? $product->quantity : old('quantity') }}" required />
                                        <x-input-error for="quantity" class="mt-2" />
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
