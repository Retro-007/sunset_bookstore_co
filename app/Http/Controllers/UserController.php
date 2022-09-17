<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.viewAllUsers', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
    public function addUser(Request $request)
    {
        $user = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();
        if ($user) {
            return redirect()->back()->with(['warning' => "User Email Or Phone Already Used"]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        if ($request->has('role')) {
            $user->assignRole($request->role);
        }


        $user->save();

        return redirect()->back()->with('success', 'User Created Successfully');
    }
    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        // dd($wallet->transactions);
        return view('admin.users.editUser', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
    public function updateUser(Request $request)
    {


        $user = User::where('id', $request->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;


        $user->save();
        return redirect()->back()->with(['success' => 'Details Updated Successfully']);
    }
    public function updateRole(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($request->password) {
            $user->password = \Hash::make($request->password);
        }
        if ($request->has('role')) {
            $user->roles()->sync($request->role);
        }
        $user->save();
        return redirect()->back()->with(['success' => "Role Updated Successfully"]);
    }
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with(['success' => 'User Deleted Successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Something Went Wrong']);
        }
    }
    public function viewDeletedUsers(Request $request)
    {
        $users = User::onlyTrashed()->get();
        return view('admin.users.deletedUsers', ['users' => $users]);
    }
    public function restoreUser($id)
    {
        try {
            $user = User::withTrashed()
                ->where('id', $id)
                ->restore();
            return redirect()->back()->with(['success' => "User Restored Successfully"]);
        } catch (\Illuminate\Database\QueryException $qe) {
            return redirect()->back()->with(['error' => $qe->getMessage()]);
        } catch (Exception $e) {
            return redirect()->back()->with(['message' => $e->getMessage()]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
