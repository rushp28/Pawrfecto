<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-input id="role" class="block mt-1 w-full" type="hidden" name="role" value="customer" required />

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Date of Birth Field -->
            <div class="mt-4">
                <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
                <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            </div>

            <!-- Mobile Number Field -->
            <div class="mt-4">
                <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required maxlength="10" />
            </div>

            <!-- Street Address Field -->
            <div class="mt-4">
                <x-label for="street_address" value="{{ __('Street Address') }}" />
                <x-input id="street_address" class="block mt-1 w-full" type="text" name="street_address" :value="old('street_address')" required maxlength="255" />
            </div>

            <!-- City Field -->
            <div class="mt-4">
                <x-label for="city" value="{{ __('City') }}" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required maxlength="100" />
            </div>

            <!-- State Field -->
            <div class="mt-4">
                <x-label for="state" value="{{ __('State') }}" />
                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required maxlength="100" />
            </div>

            <!-- Postal Code Field -->
            <div class="mt-4">
                <x-label for="postal_code" value="{{ __('Postal Code') }}" />
                <x-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" maxlength="10" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
