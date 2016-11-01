<?php

namespace Lara\Auth\App\Http\Requests;


use Auth;
use CMS\App\Http\Requests\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,100',
            'email' => 'required|email|unique:users,email,'. Auth::user()->id,
            'password' => 'required|between:3,100',
        ];
    }
}
