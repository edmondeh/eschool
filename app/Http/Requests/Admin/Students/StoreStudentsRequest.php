<?php

namespace App\Http\Requests\Admin\Students;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'parent_name' => 'nullable|string|max:255|min:3',
            'section_id' => 'required',
            'phone' => 'required|min:3',
            'address' => 'required|string|max:255|min:3',
            'gender' => 'required',
            'birthday' => 'required',
            'email' => 'required|string|max:255|email',
            'bio' => 'required|string|max:255|min:3',
            'password' => 'required|string|confirmed|min:6',   
            'password_confirmation' => 'required_with:password|min:6'
        ];
    }
}
