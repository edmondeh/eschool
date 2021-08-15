<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Classes\StoreClassesRequest;
use App\Http\Requests\Admin\Classes\UpdateClassesRequest;
use App\Models\Classe;
use App\Models\Departament;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClassesController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $classes = Classe::all();

        return view('admin.page.classes.index',
        [	
        	'classes' => $classes
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $class = Classe::findOrFail($request->segment(3));

        return view('admin.page.classes.show',
        	[	
        		'class' => $class
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $deps = Departament::all();
        $teachs = Professor::all();

        return view('admin.page.classes.create', compact('deps', 'teachs'));
    }
    public function store(StoreClassesRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if(Classe::create($request->all())) {
        	flash('New Class has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.classes.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $classes = Classe::findOrFail($id);
        $deps = Departament::all();
        $teachs = Professor::all();

        return view('admin.page.classes.edit', compact('classes', 'deps', 'teachs'));
    }
    public function update(UpdateClassesRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $class = Classe::findOrFail($id);

        if ($class->update($request->all())) {
            flash('Class has bean successfully edited.')->success()->important();
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
        $class = Classe::findOrFail($id);
        if ($class->delete()) {
            flash('Class with name "' . $class->name . '" has been deleted.')->error()->important();
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
            $entries = Classe::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected classes has been deleted.')->error()->important();
        }
    }
}
