<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        if ($user->hasRole('super admin')) {
            if ($user->email === "superadmin@pawrfecto.lk") {
                return;
            }

            $superAdmin = $user->superAdmin;
            $superAdmin->delete();
        }
        elseif ($user->hasRole('vendor')) {
            $vendor = $user->vendor;
            $vendor->delete();
        }
        elseif ($user->hasRole('customer')) {
            $customer = $user->customer;
            $customer->delete();
        }

        $user->roles()->detach();
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
