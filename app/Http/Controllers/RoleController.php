<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('verified')->except(['show']);
        $this->middleware('checkrole');
    }

    function rolemanager(){
        // $permission = Permission::create(['name' => 'delete product']);
        return view('admin.role.index', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'users' => User::where('role', 1)->get()
        ]);
        
    }

    function roleadd(Request $request){
        $request->validate([
            
            'role_name' => 'unique:roles,name'
        ]);

        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);
        return back();
    }

    function roleassign(Request $request){
      $user = User::find($request->user_id);
      $user->assignRole($request->role_name);
      return back();
    }

    function rolepermissionedit($user_id){
        return view('admin.role.edit',[
            'permissions' => Permission::all(),
            'user' => User::find($user_id),
        ]);
      }

      function rolepermissioneditpost(Request $request){
        $user = User::find($request->user_id);
        $user->syncPermissions($request->permission);
        return back();
      }











    //   
}
