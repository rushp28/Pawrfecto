<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('super-admins.users.index', [
            'users' => User::all(),
        ]);
    }
}
