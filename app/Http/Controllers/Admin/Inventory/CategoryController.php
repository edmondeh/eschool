<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Inventory\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Inventory\Category\UpdateCategoryRequest;
use App\Models\Inventory\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $inventories = Category::all();

        return view('admin.page.inventory.category.index',
        [	
        	'inventories' => $inventories
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $inventory_category = Category::findOrFail($request->segment(4));

        return view('admin.page.inventory.category.show',
        	[	
        		'inventory_category' => $inventory_category
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        return view('admin.page.inventory.category.create');
    }
    public function store(StoreCategoryRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if($grades = Category::create($request->all())) {
        	flash('New Category has bean successfully added.')->success()->important();
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.inventory.category.index');
        //return redirect('admin/inventory/category');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $category = Category::findOrFail($id);

        return view('admin.page.inventory.category.edit', compact('category'));
    }
    public function update(UpdateCategoryRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $category = Category::findOrFail($id);

        if ($category->update($request->all())) {
            flash('Category has bean successfully edited.')->success()->important();
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
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            flash('Category with name "' . $category->name . '" has been deleted.')->error()->important();
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
            $entries = Category::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected categories has been deleted.')->error()->important();
        }
    }
}
