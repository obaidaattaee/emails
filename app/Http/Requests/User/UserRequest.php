<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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



    public function rules()
    {
        $id=$this->route('user');
        return [
            'email'=>'required|email|unique:users,email,'.$id.',id',
            'name'=>'required' ,
            'password' => 'required|min:6',
        ];
    }
}
