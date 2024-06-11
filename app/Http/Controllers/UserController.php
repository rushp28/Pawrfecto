<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('super-admins.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->hasRole('super admin')) {
            if ($user->email === "superadmin@pawrfecto.lk") {
                return redirect()->route('users.index');
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
        $user->delete();

        return redirect()->route('users.index');
    }
}
