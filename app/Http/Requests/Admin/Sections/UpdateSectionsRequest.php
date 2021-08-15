<?php

namespace App\Http\Requests\Admin\Sections;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateSectionsRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'class_id' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'info' => 'required|string|max:255',
        ];
    }
}
