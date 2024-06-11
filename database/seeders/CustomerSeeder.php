<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Customer',
            'email' => 'customer@pawrfecto.lk',
            'password' => bcrypt('password'),
        ]);

        Customer::create([
            'user_id' => $user->id,
            'date_of_birth' => '2001-01-01',
            'street_address' => '123, Main Street',
            'city' => 'Colombo',
            'state' => 'Western Province',
            'postal_code' => '12345',
        ]);

        $role = Role::where('name', 'customer')->first();
        if ($role) {
            $user->roles()->attach($role);
        }
    }
}
