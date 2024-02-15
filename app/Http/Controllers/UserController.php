<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Enums\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.users.form', [
            'user' => (new User()),
            'roles' => Role::cases(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
        ]);

        $validated['password'] = bcrypt('password');

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.form', [
            'user' => $user,
            'roles' => Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User successfully deleted!');
    }
}
