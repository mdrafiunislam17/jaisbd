<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController1 extends Controller
{

      public function __construct()
        {
            $this->middleware('permission:role-list|role-create|role-edit|role-delete')->only('index');
            $this->middleware('permission:role-create')->only(['create', 'store']);
            $this->middleware('permission:role-edit')->only(['edit', 'update']);
            $this->middleware('permission:role-delete')->only('destroy');
        }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $auth_user = Auth::user();
            if ($auth_user->hasRole('superadmin')) {
                $roles = Role::all();
            } else {
                $roles = Role::where('name','!=', 'superadmin')->get();
            }
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) use ($auth_user) {
                    if ($auth_user->hasRole('superadmin')) {
                        return [
                            'id' => $row->id,
                            'role' => $auth_user->roles->first()->name ?? null,
                        ];
                    }
                    return ['id' => $row->id];
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.roles.index');
    }

    public function create()
    {
        $auth_user = Auth::user();
        if ($auth_user->hasRole('superadmin')) {
            $permission = Permission::all();
        } else {
            $permission = Permission::whereNotIn('name', [
                'page-list', 'page-create', 'page-edit', 'page-delete',
                'page-content-create', 'page-content-delete'
            ])->get();
        }
        return view('admin.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array|min:1',
        ]);

        $newRole = Role::create(['name' => $request->input('name')]);

        $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name')->toArray();

        $newRole->givePermissionTo($permissions);

        return redirect()->route('role.index')->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions;

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $auth_user = Auth::user();
        $role = Role::findOrFail($id);

        if ($role->name === 'superadmin' && !$auth_user->hasRole('superadmin')) {
            return redirect()->route('role.index');
        }

        if ($auth_user->hasRole('superadmin')) {
            $permission = Permission::all();
        } else {
            $permission = Permission::whereNotIn('name', [
                'page-list', 'page-create', 'page-edit', 'page-delete',
                'page-content-create', 'page-content-delete'
            ])->get();
        }

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required|array|min:1',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('role.index')->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->name === 'superadmin' && !Auth::user()->hasRole('superadmin')) {
            return redirect()->route('role.index');
        }

        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }
}
