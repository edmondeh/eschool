<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Exams\StoreExamsRequest;
use App\Http\Requests\Admin\Exams\UpdateExamsRequest;
use App\Models\Departament;
use App\Models\Exam;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ExamsController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $exams = Exam::all();

        return view('admin.page.exams.index',
        [	
        	'exams' => $exams
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $exams = Exam::findOrFail($request->segment(3));

        return view('admin.page.exams.show',
        	[	
        		'exams' => $exams
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $deps = Departament::all();
        $teachs = Professor::all();

        return view('admin.page.exams.create', compact('deps', 'teachs'));
    }
    public function store(StoreExamsRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if($exams = Exam::create($request->all())) {
        	flash('New Exam has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.exams.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $exams = Exam::findOrFail($id);
        $deps = Departament::all();
        $subjects = Subject::where([['section_id', $exams->subjects->sections->id],
                                    ['class_id', $exams->subjects->sections->classes->id]])
                                    ->get();
        $subject = Subject::findOrFail($exams->subject_id);
        $teachs = Professor::all();
        return view('admin.page.exams.edit', compact('exams', 'deps', 'subjects', 'subject', 'teachs'));
    }
    public function update(UpdateExamsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $exams = Exam::findOrFail($id);

        if ($exams->update($request->all())) {
            flash('Exam has bean successfully edited.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        // if ($request->file('file')) {
        //     $exams->addMediaFromRequest('file')
        //             ->usingFileName(str_random('40') . '.' . $request->file('file')->extension())
        //             ->toMediaCollection('file-material');
        // }

        return back()->withErrors($request->errors)->withInput();
    }
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $exam = Exam::findOrFail($id);
        if ($exam->delete()) {
            flash('Exam with name "' . $exam->name . '" has been deleted.')->error()->important();
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
            $entries = Exam::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected exams has been deleted.')->error()->important();
        }
    }
}
