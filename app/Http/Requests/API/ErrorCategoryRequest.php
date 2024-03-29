<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ErrorCategoryRequest extends FormRequest
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
            'code' => 'required|integer|max:1000',
            'name' => 'required|min:2',
            'description' => 'required|min:5|max:1500',
        ];
    }
}
