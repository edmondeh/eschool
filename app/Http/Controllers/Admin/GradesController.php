<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Grades\StoreGradesRequest;
use App\Http\Requests\Admin\Grades\UpdateGradesRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GradesController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $grades = Grade::all();

        return view('admin.page.grades.index',
        [	
        	'grades' => $grades
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $grades = Grade::findOrFail($request->segment(3));

        return view('admin.page.grades.show',
        	[	
        		'grades' => $grades
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        return view('admin.page.grades.create');
    }
    public function store(StoreGradesRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if($grades = Grade::create($request->all())) {
        	flash('New Grade has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.grades.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $grades = Grade::findOrFail($id);

        return view('admin.page.grades.edit', compact('grades'));
    }
    public function update(UpdateGradesRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $grades = Grade::findOrFail($id);

        if ($grades->update($request->all())) {
            flash('Grade has bean successfully edited.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }


        return back()->withErrors($request->errors)->withInput();
    }
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $grade = Grade::findOrFail($id);
        if ($grade->delete()) {
            flash('Grade with name "' . $grade->name . '" has been deleted.')->error()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return back();
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        };
        if ($request->input('ids')) {
            $entries = Grade::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected grades has been deleted.')->error()->important();
        }
    }
}
