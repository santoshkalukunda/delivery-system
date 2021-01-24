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
    public function index(){
        $users=User::with(['branch','roles'])->latest()->paginate(10);
     return view('user.index',compact('users'));
    }
    public function edit(User $user){
        $branches=Branch::get();
        $roles=Role::get();
        return view('user.edit',compact('branches','roles','user'));
    }

    public function update(UserRequest $request, User $user){
        $data=$request->validated();
        $user->update($data);
        $user->syncRoles($data['role']);
        return redirect()->back()->with('success', 'User Updated.');

    }
    public function changePasswordShow(User $user){
        return view('user.change-password',compact('user'));
    }
    public function changePassword(ChangePasswordRequest $request, User $user){
        if (Hash::check($request->current, Auth::user()->password)) {
            $user->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with('success', "Password change successfull"); 
        }else{
            return redirect()->back()->with('error', "Incorrect your current password");
        }
    }
     
    public function destroy(User $user){
        $user->delete();
        return redirect()->back()->with('success','User deleted');
    }
}
