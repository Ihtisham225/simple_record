<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'c_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'c_name' => 'Customer Name',
            'phone' => 'Phone Number',
            'address' => 'Address',
        ];
    }
}
