<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Redirect;

class RegisterPost extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => "Missing Name",
            'surname.required' => "Missing Surname",
            'birth-date.before' => "You Must be 18 Years old",
            'image.required' => "Missing Image",
            'image.max' => "File is too big"
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
            'name' => 'required',
            'surname' => 'required',
            'birth-date' => 'before:-18 years',
            'image' => 'required|mimes:jpeg,png,jpg|max:4096',
        ];
    }
}
