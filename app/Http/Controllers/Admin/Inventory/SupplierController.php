<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Inventory\Suppliers\StoreSuppliersRequest;
use App\Http\Requests\Admin\Inventory\Suppliers\UpdateSuppliersRequest;
use App\Models\Inventory\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SupplierController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $inventories = Supplier::all();

        return view('admin.page.inventory.suppliers.index',
        [	
        	'inventories' => $inventories
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $suppliers = Supplier::findOrFail($request->segment(4));

        return view('admin.page.inventory.suppliers.show',
        	[	
        		'suppliers' => $suppliers
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        return view('admin.page.inventory.suppliers.create');
    }
    public function store(StoreSuppliersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if($suppliers = Supplier::create($request->all())) {
        	flash('New Supplier has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.inventory.suppliers.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $suppliers = Supplier::findOrFail($id);

        return view('admin.page.inventory.suppliers.edit', compact('suppliers'));
    }
    public function update(UpdateSuppliersRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $suppliers = Supplier::findOrFail($id);

        if ($suppliers->update($request->all())) {
            flash('Supplier has bean successfully edited.')->success()->important();
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
        $supplier = Supplier::findOrFail($id);
        if ($supplier->delete()) {
            flash('Supplier with name "' . $supplier->name . '" has been deleted.')->error()->important();
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
            $entries = Supplier::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected suppliers has been deleted.')->error()->important();
        }
    }
}
