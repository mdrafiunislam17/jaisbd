<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{

       public function __construct()
        {
            $this->middleware('permission:assign-role-list|assign-role-create|assign-role-edit|assign-role-delete')->only('index');
            $this->middleware('permission:assign-role-create')->only(['create', 'store']);
            $this->middleware('permission:assign-role-edit')->only(['edit', 'update']);
            $this->middleware('permission:assign-role-delete')->only('destroy');
        }

    public function index()
{
    $users = User::all();
    $roles = Role::with('permissions')->get(); // Get roles with permissions

    foreach ($users as $user) {
        $user->role = $user->roles->pluck('name')->first(); // Single role per user
    }

    return view('admin.assign-role.index', compact('users', 'roles'));
}

    public function assignRole(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->roles()->detach();
        $user->assignRole($request->role);
        return back()->with('success', 'Role assigned successfully');
    }

}
