<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicSyllabus\StoreAcademicSyllabusRequest;
use App\Http\Requests\Admin\AcademicSyllabus\UpdateAcademicSyllabusRequest;
use App\Models\AcademicSyllabus;
use App\Models\Departament;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcademicSyllabusController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $academicsyllabus = AcademicSyllabus::all();

        // $a = AcademicSyllabus::findOrFail('1');
        // dd($a->getMedia('file-syllabus')->last());

        return view('admin.page.academicsyllabus.index',
        [	
        	'academicsyllabus' => $academicsyllabus
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $academicsyllabus = AcademicSyllabus::findOrFail($request->segment(3));

        return view('admin.page.academicsyllabus.show',
        	[	
        		'academicsyllabus' => $academicsyllabus
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $subjects = Subject::all();
        $teachs = Professor::all();
        $deps = Departament::select('id', 'name')->get();

        return view('admin.page.academicsyllabus.create', compact('subjects', 'teachs', 'deps'));
    }
    public function store(StoreAcademicSyllabusRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $subject = Subject::findOrFail($request->input('subject_id'));
        $teacher = Professor::findOrFail($request->input('teacher_id'));

        if($academic = AcademicSyllabus::create($request->all())) {
        	flash('New Syllabus file has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        if ($request->file('file')) {
            $academic->addMediaFromRequest('file')
                    ->usingFileName(str_random('40') . '.' . $request->file('file')->extension())
                    ->toMediaCollection('file-syllabus');
        }

        return redirect()->route('admin.academicsyllabus.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $academicsyllabus = AcademicSyllabus::findOrFail($id);
        $deps = Departament::all();
        $subjects = Subject::all();
        $subject = Subject::findOrFail($id);
        $teachs = Professor::all();

        return view('admin.page.academicsyllabus.edit', compact('academicsyllabus', 'deps', 'subjects', 'subject', 'teachs'));
    }
    public function update(UpdateAcademicSyllabusRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $academicsyllabus = AcademicSyllabus::findOrFail($id);

        if ($academicsyllabus->update($request->all())) {
            flash('AcademicSyllabus has bean successfully edited.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        if ($request->file('file')) {
            $academicsyllabus->addMediaFromRequest('file')
                    ->usingFileName(str_random('40') . '.' . $request->file('file')->extension())
                    ->toMediaCollection('file-syllabus');
        }

        return back()->withErrors($request->errors)->withInput();
    }
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $academicsyllabus = AcademicSyllabus::findOrFail($id);
        if ($academicsyllabus->delete()) {
            flash('AcademicSyllabus with name "' . $academicsyllabus->name . '" has been deleted.')->error()->important();
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
            $entries = AcademicSyllabus::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected academicsyllabus has been deleted.')->error()->important();
        }
    }
}
