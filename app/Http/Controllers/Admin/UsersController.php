<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $users = User::all();

        return view('admin.page.users.index', [
    		'active' => "users-m",
    		'users' => $users
    	]);
    }
    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        // $roles = Role::get()->pluck('name');
        $roles = Role::all();

        return view('admin.page.users.create', [
            'active' => "users-m",
            'roles' => $roles
        ]);
    }
    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.page.users.index');
    }
    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $roles = Role::get()->pluck('name', 'name');
        $user = User::findOrFail($id);
        $role1 = $user->roles()->pluck('name', 'name');
        
        // $role = $user->roles->pluck('name', 'id')->toArray();
        // if(array_key_exists('admin',$role)){
        //     echo "hello";
        // }
        // $r = array_flip($role);

        return view('admin.page.users.edit', compact('user', 'roles', 'role1'));
    }
    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        if ($request->get('password') == '') {
            if ($user->update($request->except('password'))) {
                flash('Your account has been updated!')->success()->important();
            }
        } else {
            if ($user->update($request->all())) {
                flash('Your account has been updated!')->success()->important();
            }
        }

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        //$user->syncRoles([$admin->id, $owner->id]);
        return back()->withErrors($request->errors)->withInput();

        //return redirect()->route('admin.page.users.index');
    }
    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        if ($user->delete()) {
            flash('User ' . $user->name . ' has been deleted.')->error()->important();
        }

        //return redirect()->route('admin.page.users.index');
        return back();
    }
    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        };
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected users has been deleted.')->error()->important();
        }
    }
}
