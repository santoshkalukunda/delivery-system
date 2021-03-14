<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $branches = Branch::get();
        $roles = Role::get();
        $users = User::with(['branch', 'roles'])->latest()->paginate(10);
        return view('user.index', compact('users', 'branches', 'roles'));
    }
    public function edit(User $user)
    {
        $branches = Branch::get();
        $roles = Role::get();
        return view('user.edit', compact('branches', 'roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->email == $user->email) {
            $request->validate([
                'branch_id' => ['required'],
                'name' => 'required',
                'role' => 'required',
            ]);
            $data = $request->all();
            $user->update([
                'name' => $data['name'],
            ]);
        } else {
            $request->validate([
                'branch_id' => 'required',
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'role' => 'required',
            ]);

            $data = $request->all();
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        $user->syncRoles($data['role']);
        return redirect()->back()->with('success', 'User Updated.');
    }
    public function changePasswordShow(User $user)
    {
        return view('user.change-password', compact('user'));
    }
    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        if (Hash::check($request->current, Auth::user()->password)) {
            if (Auth::user()->hasRole(['admin'])) {
                $user->update(['password' => Hash::make($request->password)]);
            } else {
                if ($user->id == Auth::user()->id) {
                    $user->update(['password' => Hash::make($request->password)]);
                } else {
                    return redirect()->back()->with('error', "You can your password only!");
                }
            }
            return redirect()->back()->with('success', "Password change successfull");
        } else {
            return redirect()->back()->with('error', "Incorrect your current password");
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted');
    }

    public function search(Request $request)
    {
        $users = new User;
        if ($request->has('branch_id')) {
            if ($request->branch_id != null)
                $users = $users->where('branch_id', ["$request->branch_id"]);
        }
        if ($request->has('name')) {
            if ($request->name != null)
                $users = $users->where('name', 'LIKE', ["$request->name%"]);
        }
        if ($request->has('email')) {
            if ($request->email != null)
                $users = $users->where('email', 'LIKE', ["$request->email%"]);
        }
        if ($request->has('role')) {
            if ($request->role != null)
                $users = $users->role($request->role);
        }
        $users = $users->paginate();
        $branches = Branch::get();
        $roles = Role::get();
        return view('user.index', compact('users', 'branches', 'roles'));
    }
}
