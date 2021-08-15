<?php

namespace App\Http\Requests\Admin\Subjects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateSubjectsRequest extends FormRequest
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
            'dep_id' => 'required|string|max:255',
            'class_id' => 'required|string|max:255',
            'section_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'teacher_id' => 'nullable',
            'info' => 'required|string|max:255',
        ];
    }
}
