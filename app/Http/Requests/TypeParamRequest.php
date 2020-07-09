<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeParamRequest extends FormRequest
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
            'name' => 'required|min:2',
            'description' => 'required|min:5|max:300',
            'type_id' => 'required|exists:types,id',
            'ref_type_id' => 'required|exists:types,id'
        ];
    }
}
