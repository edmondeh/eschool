<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartamentsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $deps = Departament::all();

        return view('admin.page.departaments.index', [
    		'deps' => $deps
    	]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $dep = Departament::findOrFail($request->segment(3));

        return view('admin.page.departaments.show',
        	[	
        		'dep' => $dep
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        return view('admin.page.departaments.create');
    }
    public function store(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if (Departament::create($request->all())) {
        	flash($request->name . ' has been succesfully added.')->success()->important();
        }

        return redirect()->route('admin.departaments.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $dep = Departament::findOrFail($id);

        return view('admin.page.departaments.edit', compact('dep'));
    }
    public function update(Request $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $dep = Departament::findOrFail($id);

        if ($dep->update($request->all())) {
            flash('You have successfully edited!')->success()->important();
        } else {
        	flash('Proglem edditing!')->error()->important();
    	}

        return back()->withErrors($request->errors)->withInput();
    }
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $dep = Departament::findOrFail($id);
        if ($dep->delete()) {
            flash('Departament with name "' . $dep->name . '" has been deleted.')->error()->important();
        }

        return back();
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        };
        if ($request->input('ids')) {
            $entries = Departament::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected departaments has been deleted.')->error()->important();
        }
    }
}
