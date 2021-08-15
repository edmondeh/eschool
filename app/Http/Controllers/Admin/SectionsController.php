<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sections\StoreSectionsRequest;
use App\Http\Requests\Admin\Sections\UpdateSectionsRequest;
use App\Models\Classe;
use App\Models\Departament;
use App\Models\Professor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SectionsController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $sections = Section::all();

        return view('admin.page.sections.index',
        [	
        	'sections' => $sections
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $section = Section::findOrFail($request->segment(3));

        return view('admin.page.sections.show',
        	[	
        		'section' => $section
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $classes = Classe::all();
        $deps = Departament::all();
        $teachs = Professor::all();

        return view('admin.page.sections.create', compact('deps', 'classes', 'teachs'));
    }
    public function store(StoreSectionsRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if(Section::create($request->all())) {
        	flash('New Section has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.sections.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $sections = Section::findOrFail($id);
        $classes = Classe::all();
        $teachs = Professor::all();

        return view('admin.page.sections.edit', compact('sections', 'classes', 'teachs'));
    }
    public function update(UpdateSectionsRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $section = Section::findOrFail($id);

        if ($section->update($request->all())) {
            flash('Section has bean successfully edited.')->success()->important();
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
        $section = Section::findOrFail($id);
        if ($section->delete()) {
            flash('Section with name "' . $section->name . '" has been deleted.')->error()->important();
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
            $entries = Section::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected sections has been deleted.')->error()->important();
        }
    }
}
