<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parents\StoreParentsRequest;
use App\Http\Requests\Admin\Parents\UpdateParentsRequest;
use App\Models\Student_Parent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ParentsController extends Controller
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

        $users = Student_Parent::all();

        return view('admin.page._parents.index',
        [	
        	'users' => $users
        ]);
    }

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user = Student_Parent::findOrFail($request->segment(3));

        return view('admin.page._parents.show',
        	[	
        		'user' => $user
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

        return view('admin.page._parents.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParentsRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user = User::create($request->all());
        $r = $request->all();

        $res = array_slice($r, 0, 1, true) +
		    array("user_id" => $user->id) +
		    array_slice($r, 1, count($r) - 1, true) ;
		//dd($res);

        if(Student_Parent::create($res)){
            flash('New Parent account has been added!')->success()->important();
        }
        $user->assignRole('teacher');

        return redirect()->route('admin.parents.index');
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
        
        $parents = Student_Parent::findOrFail($id);
        $user = User::findOrFail($parents->user_id);

        return view('admin.page._parents.edit', compact('parents', 'user'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParentsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $parent = Student_Parent::findOrFail($id);
        $user = User::findOrFail($parent->user_id);

        if ($request->get('password') == '') {
            if ($parent->update($request->except('password'))) {
                //flash('Your account has been updated!')->success()->important();
            }
        } else {
            if ($parent->update($request->all())) {
                //flash('Your account has been updated!')->success()->important();
            }
        }

        if ($request->get('password') == '') {
            if ($user->update($request->except('password'))) {
                flash('Your account has been updated!')->success()->important();
            }
        } else {
            if ($user->update($request->all())) {
                flash('Your account has been updated!')->success()->important();
            }
        }

        return back()->withErrors($request->errors)->withInput();
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
        $parent = Student_Parent::findOrFail($id);
        if ($parent->delete()) {
            flash('Parent with name "' . $parent->first_name . " " . $parent->last_name . '" has been deleted.')->error()->important();
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
            $entries = Student_Parent::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected parents has been deleted.')->error()->important();
        }
    }
}
