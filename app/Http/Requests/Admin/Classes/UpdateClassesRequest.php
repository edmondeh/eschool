<?php

namespace App\Http\Requests\Admin\Classes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateClassesRequest extends FormRequest
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
        return [
            'class_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'numeric' => 'required|string|max:255',
            'dep_id' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'info' => 'required|string|max:255',
        ];
    }
}
