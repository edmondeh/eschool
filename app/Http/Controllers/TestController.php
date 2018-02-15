<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;
//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;


class TestController extends Controller
{
	public function index()
	{
		// $role = Role::create(['name' => 'admin']);
		// $permission = Permission::create(['name' => 'edit users']);
		$user = Auth::user();

		// $role = Role::findByName('admin');
		// $role->givePermissionTo('edit users');

		// $roles = $user->getRoleNames();
		// $role = $roles->all();
		// echo $role[0];

		//$user->attachRole('superadmin');
		//$permissions = $user->allPermissions()->all();
		//$user->can('create-user');
		
		//Role::find(1)->attachPermissions(['1', '2', '3', '4']);
		//Role::find(1)->attachPermissions(['1', '2', '3', '4']); by Name

	}
	public function roles()
	{
		// $owner = new Role();
		// $owner->name         = 'superadmin';
		// $owner->display_name = 'Super Admin';
		// $owner->description  = 'Super Admin is allowed to manage all other users';
		// $owner->save();
		// $admin = new Role();
		// $admin->name         = 'admin';
		// $admin->display_name = 'Admin';
		// $admin->description  = 'Admin is allowed to manage and edit other users';
		// $admin->save();
		// $user = new Role();
		// $user->name         = 'user';
		// $user->display_name = 'User';
		// $user->description  = 'User is the normal user';
		// $user->save();
	}
	public function permissions()
	{
		// $createUser = new Permission();
		// $createUser->name         = 'create-user';
		// $createUser->display_name = 'Create Users';
		// $createUser->description  = 'create new users';
		// $createUser->save();

		// $editUser = new Permission();
		// $editUser->name         = 'edit-user';
		// $editUser->display_name = 'Edit Users';
		// $editUser->description  = 'edit existing users';
		// $editUser->save();

		// $updateUser = new Permission();
		// $updateUser->name         = 'update-user';
		// $updateUser->display_name = 'Update Users';
		// $updateUser->description  = 'Update existing users';
		// $updateUser->save();

		// $deleteUser = new Permission();
		// $deleteUser->name         = 'delete-user';
		// $deleteUser->display_name = 'Delete Users';
		// $deleteUser->description  = 'Delete existing users';
		// $deleteUser->save();

		/*$deleteUser = new Permission();
		$deleteUser->name         = 'users-manage';
		$deleteUser->display_name = 'Manage Users';
		$deleteUser->description  = 'Manage Users';
		$deleteUser->save();*/
	}
	public function r(Request $request)
	{
		dd($request);
	}
}
