<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Shop;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Vendor',
            'email' => 'vendor@pawrfecto.lk',
            'password' => bcrypt('password'),
        ]);

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'date_of_birth' => '2001-01-01',
        ]);

        $role = Role::where('name', 'vendor')->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        Shop::create([
            'vendor_id' => $vendor->id,
            'name' => 'Vendor\'s Shop',
            'street_address' => '123, Main Street',
            'city' => 'Colombo',
            'state' => 'Western Province',
            'postal_code' => '12345',
        ]);
    }
}
