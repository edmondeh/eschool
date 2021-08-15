<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UpdateUsersRequest extends FormRequest
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
        // return [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,'.$this->route('user'),
        //     'roles' => 'required',
        // ];

        if ($request->get('password') == '') {
            return [
                'first_name' => 'required|string|max:255|min:3',
                'last_name' => 'required|string|max:255|min:3',
                'email' => 'required|string|max:255|email',
                //'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',   
                //'password_confirmation' => 'required_with:password|min:6',
                'roles' => 'required',
            ];
        } else {
            return [
                'first_name' => 'required|string|max:255|min:3',
                'last_name' => 'required|string|max:255|min:3',
                'email' => 'required|string|max:255|email',
                'password' => 'required|string|confirmed|min:6',   
                'password_confirmation' => 'required_with:password|min:6',
                'roles' => 'required', 
            ];
        }
    }
}
