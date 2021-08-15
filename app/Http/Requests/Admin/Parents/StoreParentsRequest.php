<?php

namespace App\Http\Requests\Admin\Parents;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentsRequest extends FormRequest
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
            'profession' => 'nullable|string|max:255|min:3',
            'phone' => 'required|min:3',
            'address' => 'required|string|max:255|min:3',
            'gender' => 'required',
            'birthday' => 'required',
            'email' => 'required|string|max:255|email',
            'photo' => 'required',
            'profile' => 'required|string|max:255|min:3',
            'password' => 'required|string|confirmed|min:6',   
            'password_confirmation' => 'required_with:password|min:6'
        ];
    }
}
