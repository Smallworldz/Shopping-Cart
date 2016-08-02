<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'user_password' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required'
        ];
    }
}
