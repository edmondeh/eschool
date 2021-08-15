<?php

namespace App\Http\Requests\Admin\AcademicSyllabus;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicSyllabusRequest extends FormRequest
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
            'subject_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'file' => 'file',
            'info' => 'required|string|max:255',
        ];
    }
}
