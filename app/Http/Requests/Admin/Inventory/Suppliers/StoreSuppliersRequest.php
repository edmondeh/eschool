<?php

namespace App\Http\Requests\Admin\Inventory\Suppliers;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuppliersRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:inventory_suppliers',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_phone' => 'required|string|max:255',
            'contact_person_email' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }
}
