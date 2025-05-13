<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;


class AssignRoleController extends Controller
{
    //


    public function index(Request $request)
    {
        $auth_user = Auth::user();
        if ($auth_user->hasRole('superadmin')) {
            $users = User::get()->all();
            $roles = Role::pluck('name')->all();
        } else {
            // $users = User::whereHas('roles', function ($query) {
            //     return $query->where('name','!=', 'superadmin');
            // })->with('roles')->get();
            $users = User::where('name','!=', 'superadmin')->get()->all();
            $roles = Role::where('name','!=', 'superadmin')->pluck('name')->all();
        }
        if ($request->ajax()) {

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('role', function($row) {
                    if($row->roles->first() == null){
                        return '- - -';
                    }
                    return $row->roles->first()->name;

                })
                ->addColumn('action-btn', function($row) {
                    $user_info_ara = [
                        'id' => $row->id,
                        'name' => $row->name,
                        'email' => $row->email,
                        'role' => $row->roles->first()->name ?? null,
                    ];
                    return $user_info_ara;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.assign-role.index',['roles'=>$roles]);
    }

    public function assignRole(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->roles()->detach();
        $user->assignRole($request->role);
        return back()->with('success', 'Role assigned successfully');
    }
}
