<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassInfoRequest extends FormRequest
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
            'name'=>'required|string|max:10|min|3',
            'is_active'=>'nullable|string|max|1'
        ];
    }
    public function message(){
        return[
            'name.required'=>'Name is required',
            'name.min'=>'Name should be minimum of 3 characters',
            'name.max'=>'Name should be maximum of 10 characters',
            'is_active.max'=>'is_active should be maximum 1 characters'
        ];
    }
}

