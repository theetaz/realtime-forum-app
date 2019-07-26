<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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


    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name can not be exceeds 100 characters',
            'password' => 'Password is required',
            'email' => 'Email is required',
            'email.unique' => 'Provided email has been already taken',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'password' => 'required|string',
            'email' => 'required|email|unique:users',
        ];
    }
}
