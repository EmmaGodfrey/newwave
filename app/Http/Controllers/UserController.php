<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return response()->json([
            'html' => view('admin.users.modals.create')->render()
        ]);
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->is_admin = $request->boolean('is_admin');
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.'
        ]);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return response()->json([
            'html' => view('admin.users.modals.edit', compact('user'))->render()
        ]);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
            $data['remember_token'] = \Illuminate\Support\Str::random(60);
        }

        if ($user->is($request->user()) && ! $request->boolean('is_admin')) {
            return response()->json(['message' => 'You cannot remove your own admin access.', 'errors' => ['is_admin' => ['You cannot remove your own admin access.']]], 422);
        }

        $user->fill($data);
        if (isset($data['remember_token'])) $user->remember_token = $data['remember_token'];
        if ($user->isDirty('email')) $user->email_verified_at = null;
        $user->is_admin = $request->boolean('is_admin');
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully.'
        ]);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if ($user->is(auth()->user())) {
            return response()->json(['message' => 'You cannot delete your own account.'], 422);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.'
        ]);
    }
}
