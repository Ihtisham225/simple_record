<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            's_name' => 'required',
            'phone' => 'required',
            'shop' => 'required',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            's_name' => 'Seller Name',
            'phone' => 'Phone Number',
            'shop' => 'Shop Name',
            'address' => 'Address',
        ];
    }
}
