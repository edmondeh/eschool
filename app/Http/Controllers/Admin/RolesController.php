<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::all();

        return view('admin.page.roles.index', [
    		'active' => "users-m",
    		'roles' => $roles
    	]);
    }
    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        //$permissions = Permission::get()->pluck('name', 'display_name');
        $permissions = Permission::all();

        return view('admin.page.roles.create', [
            'active' => "users-m",
            'permissions' => $permissions
        ]);
    }
    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        try {
            // $role = new Role();
            // $role->name         = $request->input('name');
            // $role->display_name = $request->input('display_name');
            // $role->description  = $request->input('description');
            // $role->save();
            //$request->input('permissions') ? $role->attachPermission($request->input('permissions')) : [];

            $role = Role::create($request->except('permission'));
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->givePermissionTo($permissions);

            //Role::find(7)->attachPermissions($request->input('permissions'));
            flash('Your role have been added.')->success()->important();
        } catch (Exception $e) {
            flash('Diqka shkoi keq')->error()->important();
        }

        return redirect()->route('admin.page.roles.index');
    }
    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $permissions = Permission::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);

        $permissions1 = $role->permissions()->pluck('name', 'name');

        return view('admin.page.roles.edit', compact('role', 'permissions', 'permissions1'));
    }
    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        if($role->update($request->except('permission'))){
            flash('Role ' . $role->name.' has been edited successfuly.')->success()->important();
        }
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.page.roles.index');
    }
    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        if ($role->delete()) {
            flash('Role ' . $role->name . ' has been deleted.')->error()->important();
        }

        return redirect()->route('admin.page.roles.index');
    }
    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected roles has been deleted.')->error()->important();
        }
    }
}
