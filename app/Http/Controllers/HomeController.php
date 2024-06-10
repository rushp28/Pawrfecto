<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $user = auth()->user();

        if ($user->hasRole('super admin')) {
            return view('dashboard');
        }
//        elseif (Auth::user()->hasRole('admin')) {
//        }
//        elseif (Auth::user()->hasRole('vendor')) {
//        }
//        elseif (Auth::user()->hasRole('custom vendor role')) {
//        }
        elseif ($user->hasRole('customer')) {
            return view('index');
        }
        else {
            return view('dashboard');
        }
    }
}
