<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'super admin',
            'slug' => 'super-admin',
            'description' => 'This role has all permissions',
            'is_default' => false,
        ]);
        Role::create([
            'name' => 'admin',
            'slug' => 'admin',
            'description' => 'This role gets permissions from super admin',
            'is_default' => false,
        ]);
        Role::create([
            'name' => 'vendor',
            'slug' => 'vendor',
            'description' => 'This role is for vendors',
            'is_default' => false,
        ]);
        Role::create([
            'name' => 'custom vendor role',
            'slug' => 'custom-vendor-role',
            'description' => 'This role gets permissions from vendor',
            'is_default' => false,
        ]);
        Role::create([
            'name' => 'customer',
            'slug' => 'customer',
            'description' => 'This role is for customers',
            'is_default' => true,
        ]);
    }
}
