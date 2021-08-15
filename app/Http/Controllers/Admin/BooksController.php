<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Books\StoreBooksRequest;
use App\Http\Requests\Admin\Books\UpdateBooksRequest;
use App\Models\Book;
use App\Models\Classe;
use App\Models\Departament;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BooksController extends Controller
{
    public function index()
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $books = Book::all();

        return view('admin.page.books.index',
        [	
        	'books' => $books
        ]);
    }
    public function show(Request $request)
    {
    	if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $books = Book::findOrFail($request->segment(3));

        return view('admin.page.books.show',
        	[	
        		'books' => $books
        	]);
    }
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $deps = Departament::select('id', 'name')->get();

        return view('admin.page.books.create', compact('deps'));
    }
    public function store(StoreBooksRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if($books = Book::create($request->all())) {
        	flash('New Book has bean successfully added.')->success()->important();

            if ($request->file('file')) {
                $books->addMediaFromRequest('file')
                        ->usingFileName(str_random('40') . '.' . $request->file('file')->extension())
                        ->toMediaCollection('books');
            }
        } else {
        	flash('Something went wrong!')->error()->important();
        }

        return redirect()->route('admin.books.index');
    }
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $books = Book::findOrFail($id);
        $deps = Departament::select('id', 'name')->get();
        $classes = Classe::select('id', 'name')->where('dep_id', $books->classes->dep_id)->get();
        $sections = Section::select('id', 'name')->where('class_id', $books->classes->id)->get();

        return view('admin.page.books.edit', compact('books', 'deps', 'classes', 'sections'));
    }
    public function update(UpdateBooksRequest $request, $id)
    {  
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $books = Book::findOrFail($id);

        if ($books->update($request->all())) {
            flash('Book has bean successfully edited.')->success()->important();
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
        $book = Book::findOrFail($id);
        if ($book->delete()) {
            flash('Book with name "' . $book->name . '" has been deleted.')->error()->important();
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
            $entries = Book::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
            flash('Selected books has been deleted.')->error()->important();
        }
    }
}
