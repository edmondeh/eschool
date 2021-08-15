<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Students\StoreStudentsRequest;
use App\Http\Requests\Admin\Students\UpdateStudentsRequest;
use App\Models\Classe;
use App\Models\Departament;
use App\Models\Section;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentsController extends Controller
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

        $users = Student::all();

        return view('admin.page._students.index',
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

        $student = Student::findOrFail($request->segment(3));

        return view('admin.page._students.show',
        	[	
        		'student' => $student
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

        $deps = Departament::select('id', 'name')->get();

        return view('admin.page._students.create', compact('deps'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
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

        $Student = Student::create($res);
        $user->assignRole('student');

        if ($request->file('avatar')) {
            $student->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        return redirect()->route('admin.students.index');
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
        
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);
        $deps = Departament::select('id', 'name')->get();
        $classes = Classe::select('id', 'name')->where('dep_id', $student->sections->classes->departaments->id)->get();
        $sections = Section::select('id', 'name')->where('class_id', $student->sections->classes->id)->get();

        return view('admin.page._students.edit', compact('student', 'user', 'deps', 'classes', 'sections'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);

        if ($request->get('password') == '') {
            if ($student->update($request->except('password'))) {
                //flash('Your account has been updated!')->success()->important();
            }
        } else {
            if ($student->update($request->all())) {
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

        if ($request->file('avatar')) {
            $student->addMediaFromRequest('avatar')->toMediaCollection('avatars');
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
        $student = Student::findOrFail($id);
        if ($student->delete()) {
            flash('Student with name "' . $student->first_name . " " . $student->last_name . '" has been deleted.')->error()->important();
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
            $entries = Student::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected students has been deleted.')->error()->important();
        }
    }
}
