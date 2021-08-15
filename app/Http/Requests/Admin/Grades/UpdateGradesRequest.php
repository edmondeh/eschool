<?php

namespace App\Http\Requests\Admin\Grades;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateGradesRequest extends FormRequest
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
            'point' => 'required|string|max:255',
            'mark_from' => 'required|string|max:255',
            'mark_upto' => 'required|string|max:255',
            'info' => 'required|string|max:255',
        ];
    }
}
