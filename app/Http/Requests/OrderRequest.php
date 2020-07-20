<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'email' => 'required|email',
            'firstName' => 'required|alpha|min:2|max:20',
            'lastName' => 'required|alpha|min:2|max:20',
            'address' => 'required|min:5|max:80',
            'city' => 'required|alpha|min:2|max:20',
            'postcode' => 'required|digits_between:2,20',
            'phoneNumber' => 'required|min:5|max:20',
            'pay_method' => 'required',
        ];
    }
}
