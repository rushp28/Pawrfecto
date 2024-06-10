<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['nullable', 'string', 'max:10'],
            'street_address' => ['required', 'string', 'max:256'],
            'city' => ['required', 'string', 'max:128'],
            'state' => ['required', 'string', 'max:128'],
            'postal_code' => ['nullable', 'string', 'max:10'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            Customer::create([
                'user_id' => $user->id,
                'date_of_birth' => $input['date_of_birth'],
                'phone_number' => $input['phone_number'],
                'street_address' => $input['street_address'],
                'city' => $input['city'],
                'state' => $input['state'],
                'postal_code' => $input['postal_code'],
            ]);

            $role = Role::where('name', 'customer')->first();
            if ($role) {
                $user->roles()->attach($role);
            }

            return $user;
        });
    }
}
