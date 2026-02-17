<?php

namespace App\Http\Controllers\ManageAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManageAdminController extends Controller
{
    // 📌 Show all users (Read)
    public function index()
    {
        $users = User::all();
        return view('manage-admin.index', compact('users'));
    }

    // 📌 Show create form
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            return view('manage-admin.create');
        } else {
            return redirect()->route('permission.check')
                ->with('error', 'You are not authorized to access this page');
        }
    }


    // 📌 Store new user (Create)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('manage-admin.index')
            ->with('success', 'User created successfully');
    }

    // 📌 Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manage-admin.edit', compact('user'));
    }

    // 📌 Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // password optional
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('manage-admin.index')
            ->with('success', 'User updated successfully');
    }

    // 📌 Delete user
    public function destroy($id)
    {

        if (auth()->user()->role != 'Aadmin') {
            return redirect()->route('permission.check');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage-admin.index')
            ->with('success', 'User deleted successfully');
    }


    // 📌 Show single user (optional)
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage-admin.show', compact('user'));
    }
}
