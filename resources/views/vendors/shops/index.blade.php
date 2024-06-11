<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                {{ $shop->name }}
            </h2>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Section Title and Description -->
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <x-section-title>
                        <x-slot name="title">{{ __('Shop Information') }}</x-slot>
                        <x-slot name="description">{{ __('Update your shop information.') }}</x-slot>
                    </x-section-title>

                    <!-- Form Container -->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST" action="{{ route('shops.update', $shop->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Shop Information Section -->
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Name Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="name" value="{{ __('Name') }}" />
                                        <x-input id="name" name="name" type="text" class="block w-full mt-1" value="{{ old('name', $shop->name) }}" autocomplete="name" required />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>

                                    <!-- Description Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="description" value="{{ __('Description') }}" />
                                        <x-input id="description" name="description" type="text" class="block w-full mt-1" value="{{ old('description', $shop->description) }}" autocomplete="description" required />
                                        <x-input-error for="description" class="mt-2" />
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                                        <x-input id="phone_number" name="phone_number" type="text" class="block w-full mt-1" value="{{ old('phone_number', $shop->phone_number) }}" autocomplete="phone_number" required maxlength="10" />
                                        <x-input-error for="phone_number" class="mt-2" />
                                    </div>

                                    <!-- Street Address Field -->
                                    <div class="col-span-6 sm:col-span-6">
                                        <x-label for="street_address" value="{{ __('Street Address') }}" />
                                        <x-input id="street_address" name="street_address" type="text" class="block w-full mt-1" value="{{ old('street_address', $shop->street_address) }}" autocomplete="street-address" required maxlength="255" />
                                        <x-input-error for="street_address" class="mt-2" />
                                    </div>

                                    <!-- City Field -->
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="city" value="{{ __('City') }}" />
                                        <x-input id="city" name="city" type="text" class="block w-full mt-1" value="{{ old('city', $shop->city) }}" autocomplete="city" required maxlength="100" />
                                        <x-input-error for="city" class="mt-2" />
                                    </div>

                                    <!-- State Field -->
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="state" value="{{ __('State') }}" />
                                        <x-input id="state" name="state" type="text" class="block w-full mt-1" value="{{ old('state', $shop->state) }}" autocomplete="state" required maxlength="100" />
                                        <x-input-error for="state" class="mt-2" />
                                    </div>

                                    <!-- Postal Code Field -->
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="postal_code" value="{{ __('Postal Code') }}" />
                                        <x-input id="postal_code" name="postal_code" type="text" class="block w-full mt-1" value="{{ old('postal_code', $shop->postal_code) }}" autocomplete="postal-code" required maxlength="10" />
                                        <x-input-error for="postal_code" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Form Submission Button and Status Message -->
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 sm:rounded-bl-md sm:rounded-br-md mt-5">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
