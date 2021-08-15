<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subjects\StoreSubjectsRequest;
use App\Http\Requests\Admin\Subjects\UpdateSubjectsRequest;
use App\Models\Classe;
use App\Models\Departament;
use App\Models\Professor;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubjectsController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $subjects = Subject::all();
        //dd($subjects->sections->classes);

        return view('admin.page.subjects.index',
        [	
        	'subjects' => $subjects
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $subjects = Subject::findOrFail($request->segment(3));

        return view('admin.page.subjects.show',
        	[	
        		'subjects' => $subjects
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $deps = Departament::all();
        $teachs = Professor::all();

        return view('admin.page.subjects.create', compact('deps', 'teachs'));
    }
    public function store(StoreSubjectsRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if(Subject::create($request->all())) {
        	flash('New Subject has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.subjects.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $subjects = Subject::findOrFail($id);
        $deps = Departament::all();
        $teachs = Professor::all();

        return view('admin.page.subjects.edit', compact('subjects', 'deps', 'teachs'));
    }
    public function update(UpdateSubjectsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $Subject = Subject::findOrFail($id);

        if ($Subject->update($request->all())) {
            flash('Subject has bean successfully edited.')->success()->important();
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
        $subject = Subject::findOrFail($id);
        if ($subject->delete()) {
            flash('Subject with name "' . $subject->name . '" has been deleted.')->error()->important();
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
            $entries = Subject::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected subjects has been deleted.')->error()->important();
        }
    }
    public function select_class($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        };

        $classes = Classe::where('dep_id', $id)->select('id', 'name')->get();
        
        return view('admin.page.subjects.select_class', compact('classes'));
    }
    public function select_section($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        };

        $sections = Section::where('class_id', $id)->select('id', 'name', 'class_id')->get();
        
        return view('admin.page.subjects.select_section', compact('sections'));
    }
    public function select_subject($dep_id, $class_id, $section_id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        };

        $subjects = Subject::where([['dep_id', $dep_id],
                                    ['class_id', $class_id],
                                    ['section_id', $section_id]])
                            ->select('id', 'name')->get();
        
        return view('admin.page.subjects.select_subject', compact('subjects'));
    }
}
