<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Professors\StoreProfessorsRequest;
use App\Http\Requests\Admin\Professors\UpdateProfessorsRequest;
use App\Models\Professor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfessorsController extends Controller
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

        $users = Professor::all();

        return view('admin.page._professors.index',
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

        $user = Professor::findOrFail($request->segment(3));

        return view('admin.page._professors.show',
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

        return view('admin.page._professors.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessorsRequest $request)
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

        if ($professor = Professor::create($res)) {
            flash('New professor has been successfully added.')->success()->important();
            $user->assignRole('teacher');
        }

        return redirect()->route('admin.professors.index');
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
        
        $professors = Professor::findOrFail($id);
        $user = User::findOrFail($professors->user_id);

        return view('admin.page._professors.edit', compact('professors', 'user'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfessorsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $professor = Professor::findOrFail($id);
        $user = User::findOrFail($professor->user_id);

        if ($request->get('password') == '') {
            if ($professor->update($request->except('password'))) {
                //flash('Your account has been updated!')->success()->important();
            }
        } else {
            if ($professor->update($request->all())) {
                //flash('Your account has been updated!')->success()->important();
            }
        }

        if ($request->get('password') == '') {
            if ($user->update($request->except('password'))) {
                flash('User account has been updated!')->success()->important();
            }
        } else {
            if ($user->update($request->all())) {
                flash('User account has been updated!')->success()->important();
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
        $professor = Professor::findOrFail($id);
        if ($professor->delete()) {
            flash('Professor with name "' . $professor->first_name . " " . $professor->last_name . '" has been deleted.')->error()->important();
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
            $entries = Professor::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected professors has been deleted.')->error()->important();
        }
    }
}
