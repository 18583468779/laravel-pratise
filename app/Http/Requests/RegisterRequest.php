<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //^[a-z]\w+$/i => 字母开头，'unique:users,name' user表里的name字段是唯一的
            'name' => ['required', 'between:3,20', 'regex:/^[a-z]\w+$/i', 'unique:users,name'],
            'password' => ['required', 'between:6,20', 'confirmed']
        ];
    }
}
