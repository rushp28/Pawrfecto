<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Customer Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Section Title and Description -->
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <x-section-title>
                        <x-slot name="title">{{ __('Personal Information') }}</x-slot>
                        <x-slot name="description">{{ __('Update your mobile number, date of birth and address.') }}</x-slot>
                    </x-section-title>

                    <!-- Form Container -->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Personal Information Section -->
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Mobile Number Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="mobile_number" value="{{ __('Mobile Number') }}" />
                                        <x-input id="mobile_number" name="mobile_number" type="text" class="block w-full mt-1" value="{{ old('mobile_number', $customer->phone_number) }}" autocomplete="mobile-number" required maxlength="10" />
                                        <x-input-error for="mobile_number" class="mt-2" />
                                    </div>

                                    <!-- Date of Birth Field -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="date_of_birth" value="{{ __('Date Of Birth') }}" />
                                        <x-input id="date_of_birth" name="date_of_birth" type="date" class="block w-full mt-1" value="{{ old('date_of_birth', $customer->date_of_birth) }}" autocomplete="date-of-birth" required />
                                        <x-input-error for="date_of_birth" class="mt-2" />
                                    </div>

                                    <!-- Street Address Field -->
                                    <div class="col-span-6 sm:col-span-6">
                                        <x-label for="street_address" value="{{ __('Street Address') }}" />
                                        <x-input id="street_address" name="street_address" type="text" class="block w-full mt-1" value="{{ old('street_address', $customer->street_address) }}" autocomplete="street-address" required maxlength="255" />
                                        <x-input-error for="street_address" class="mt-2" />
                                    </div>

                                    <!-- City Field -->
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="city" value="{{ __('City') }}" />
                                        <x-input id="city" name="city" type="text" class="block w-full mt-1" value="{{ old('city', $customer->city) }}" autocomplete="city" required maxlength="100" />
                                        <x-input-error for="city" class="mt-2" />
                                    </div>

                                    <!-- State Field -->
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="state" value="{{ __('State') }}" />
                                        <x-input id="state" name="state" type="text" class="block w-full mt-1" value="{{ old('state', $customer->state) }}" autocomplete="state" required maxlength="100" />
                                        <x-input-error for="state" class="mt-2" />
                                    </div>

                                    <!-- Postal Code Field -->
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="postal_code" value="{{ __('Postal Code') }}" />
                                        <x-input id="postal_code" name="postal_code" type="text" class="block w-full mt-1" value="{{ old('postal_code', $customer->postal_code) }}" autocomplete="postal-code" required maxlength="10" />
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
