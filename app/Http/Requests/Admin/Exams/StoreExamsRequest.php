<?php

namespace App\Http\Requests\Admin\Exams;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'dep_id' => 'required|string|max:255',
            'class_id' => 'required|string|max:255',
            'section_id' => 'required|string|max:255',
            'subject_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'info' => 'required|string|max:255',
        ];
    }
}
