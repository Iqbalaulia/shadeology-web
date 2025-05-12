<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // data roles
        $roles = Role::all();

        return view('admin.pages.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Attempting to create member with data:', $request->all());

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make('shadeology123'),
            ]);

            $user->assignRole($request->role);

            Log::info('Users created successfully:', $user->toArray());
            return redirect()->route('admin.users.index')
                ->with('success', 'Users created successfully');
        } catch (\Exception $e) {
            Log::error('Member creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to member event. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::info('User edit started', ['user_id' => $id]);

        try {
            $user = User::with('roles')->findOrFail($id);
            return response()->json($user);
        } catch (\Exception $th) {
            Log::error('Failed user edit', ['user_id' => $id]);
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Log::info('User update started', ['user_id' => $id]);

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            if ($request->role) {
                $user->syncRoles($request->role);
            }

            $user->update();
            return redirect()->route('admin.users.index')
                ->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update user. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('Start to delete user: ' . $id);

        try {
            $user = User::findOrFail($id);
            $user->delete();

            Log::info('Success to delete user: ' . $id);
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete user: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete user');
        }
    }
}
