<?php

namespace App\Http\Requests\Admin\Books;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateBooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $book = Book::findOrFail($request->b_id);

        if($request->name == $book->name) {
            return [
                'book_id' => 'required|max:255',
                'name' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|string|max:255',
                'class_id' => 'required',
                'section_id' => 'required',
                'file' => 'file',
            ];
        }
        else {
            return [
                'book_id' => 'required|max:255|unique:books',
                'name' => 'required|string|max:255|unique:books',
                'author' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|string|max:255',
                'class_id' => 'required',
                'section_id' => 'required',
                'file' => 'file',
            ];
        }
    }
}
