<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReligionRequest extends FormRequest
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
            'name'=>'required|string|min:2|max:30',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Name is mandatory',
            'name.string'=>'Name must be a string',
            'name.min'=>'Religion name must be at least 2 characters',
            'name.max'=>'Religion name must be at most 30 characters',
        ];
    }
}
