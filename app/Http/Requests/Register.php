<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:190',
            'email'=>'required|email|unique:users,email',
            'mobile'=>'required|numeric|unique:users,mobile',
            'password'=>'required|min:6|max:20|confirmed',//يعني لا يقل على ست حروف او اكثر من 20
        ];
    }

    public function attributes(){
        return [
               'name'=>trans('main.name'),
               'email'=>trans('main.email'),
               'mobile'=>trans('main.mobile'),
               'password'=>trans('main.password'),
               'password_confirmation'=>trans('main.password_confirmation'),


        ];


    }

    
}
