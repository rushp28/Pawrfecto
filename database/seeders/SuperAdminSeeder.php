<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@pawrfecto.lk',
            'password' => bcrypt('password'),
        ]);

        SuperAdmin::create([
            'user_id' => $user->id,
        ]);

        $role = Role::where('name', 'super admin')->first();
        if ($role) {
            $user->roles()->attach($role);
        }
    }
}
