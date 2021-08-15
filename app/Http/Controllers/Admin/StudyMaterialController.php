<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudyMaterials\StoreStudyMaterialsRequest;
use App\Http\Requests\Admin\StudyMaterials\UpdateStudyMaterialsRequest;
use App\Models\Departament;
use App\Models\Professor;
use App\Models\StudyMaterial;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudyMaterialController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $studymaterials = StudyMaterial::all();

        // $a = AcademicSyllabus::findOrFail('1');
        // dd($a->getMedia('file-syllabus')->last());

        return view('admin.page.studymaterials.index',
        [	
        	'studymaterials' => $studymaterials
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $studymaterials = StudyMaterial::findOrFail($request->segment(3));

        return view('admin.page.studymaterials.show',
        	[	
        		'studymaterials' => $studymaterials
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $deps = Departament::all();
        $subjects = Subject::all();
        $teachs = Professor::all();

        return view('admin.page.studymaterials.create', compact('deps','subjects', 'teachs'));
    }
    public function store(StoreStudyMaterialsRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $subject = Subject::findOrFail($request->input('subject_id'));
        $teacher = Professor::findOrFail($request->input('teacher_id'));

        if($studymaterial = StudyMaterial::create($request->all())) {
        	flash('New Syllabus file has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        if ($request->file('file')) {
            $studymaterial->addMediaFromRequest('file')
                    ->usingFileName(str_random('40') . '.' . $request->file('file')->extension())
                    ->toMediaCollection('file-material');
        }

        return redirect()->route('admin.studymaterials.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $studymaterials = StudyMaterial::findOrFail($id);
        $deps = Departament::all();
        //dd($studymaterials->subjects->sections->id);
        //dd($studymaterials->subjects->sections->classes->id);
        $subjects = Subject::where([['section_id', $studymaterials->subjects->sections->id],
                                    ['class_id', $studymaterials->subjects->sections->classes->id]])
                                    ->get();
        $subject = Subject::findOrFail($studymaterials->subject_id);
        $teachs = Professor::all();
        return view('admin.page.studymaterials.edit', compact('studymaterials', 'deps', 'subjects', 'subject', 'teachs'));
    }
    public function update(UpdateStudyMaterialsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $studymaterials = StudyMaterial::findOrFail($id);

        if ($studymaterials->update($request->all())) {
            flash('Study Material has bean successfully edited.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        if ($request->file('file')) {
            $studymaterials->addMediaFromRequest('file')
                    ->usingFileName(str_random('40') . '.' . $request->file('file')->extension())
                    ->toMediaCollection('file-material');
        }

        return back()->withErrors($request->errors)->withInput();
    }
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $studymaterial = StudyMaterial::findOrFail($id);
        if ($studymaterial->delete()) {
            flash('Study Material with name "' . $studymaterial->name . '" has been deleted.')->error()->important();
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
            $entries = StudyMaterial::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected materials has been deleted.')->error()->important();
        }
    }
}
