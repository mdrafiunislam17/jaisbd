<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(Request $request)
// {
//     if ($request->ajax()) {
//         $auth_user = Auth::user();

//         $roles = $auth_user->hasRole('superadmin')
//             ? Role::all()
//             : Role::where('name', '!=', 'superadmin')->get();

//         return DataTables::of($roles)
//             ->addIndexColumn()
//             ->addColumn('action-btn', function($row) {
//                 $btn = '<div class="action-btn">';
//                 $btn .= '<a href="' . route('role.edit', $row->id) . '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
//                 if ($row->name != 'superadmin') {
//                     $btn .= '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' . route('role.delete', $row->id) . '\')"><i class="ri-delete-bin-2-line"></i></a>';
//                 }
//                 $btn .= '</div>';
//                 return $btn;
//             })
//             ->rawColumns(['action-btn'])
//             ->make(true);
//     }

//     return view('admin.roles.index');
// }

public function index()
{
    $auth_user = Auth::user();

    $roles = $auth_user->hasRole('superadmin')
        ? Role::all()
        : Role::where('name', '!=', 'superadmin')->get();

    return view('admin.roles.index', compact('roles'));
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $auth_user = Auth::user();
        if ($auth_user->hasRole('superadmin')) {
            $permission = Permission::get();
        } else {
            $permission = Permission::whereNotIn('name', ['page-list', 'page-create', 'page-edit', 'page-delete', 'page-content-create', 'page-content-delete'])->get();
        }
        return view('admin.roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        Role::create(['name' => $request->input('name')]);

        $newRole = Role::findByName($request->input('name'));
        foreach ($request->input('permission') as $key => $value) {
            $permissionName = Permission::findById($value);
            $newRole->givePermissionTo($permissionName->name);
        }

        return redirect()
            ->route('role.index')
            ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $auth_user = Auth::user();
        $role = Role::findorfail($id);

        if ($role->name === 'superadmin' && !$auth_user->hasRole('superadmin')) {
            return redirect()->route('role.index');
        }

        if ($auth_user->hasRole('superadmin')) {
            $permission = Permission::get();
        } else {
            $permission = Permission::whereNotIn('name', ['page-list', 'page-create', 'page-edit', 'page-delete', 'page-content-create', 'page-content-delete'])->get();
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        DB::table("role_has_permissions")->where('role_id',$id)->delete();

        $newRole = Role::findByName($request->input('name'));
        foreach ($request->input('permission') as $key => $value) {
            $permissionName = Permission::findById($value);
            $newRole->givePermissionTo($permissionName->name);
        }

        return redirect()->route('role.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id): RedirectResponse
    // {
    //     DB::table("roles")->where('id',$id)->delete();
    //     return redirect()->route('role.index')
    //                     ->with('success', 'Role deleted successfully');
    // }

    public function destroy($id){
        $role = Role::find($id);
        if ($role->name === 'superadmin' && !Auth::user()->hasRole('superadmin')) {
            return redirect()->route('role.index');
        }
        $role->delete();
        return redirect()->route('role.index')
                        ->with('success', 'Role deleted successfully');
    }

}
