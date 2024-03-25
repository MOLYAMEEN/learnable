<?php

namespace App\Http\Requests;
use App\Rules\NameRule;
use Illuminate\Foundation\Http\FormRequest;

class TestCreate extends FormRequest
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
            'name'=>['required','max:255','string', new NameRule],
            'content'=>'required|string',
        ];
    }

    public function attributes(){
      return [
        'name'=>'Name',
        'content'=>'content post',

      ];

    }

}
