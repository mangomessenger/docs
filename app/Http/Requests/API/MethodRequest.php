<?php

namespace App\Http\Requests\API;

use App\Method;
use Illuminate\Foundation\Http\FormRequest;

class MethodRequest extends FormRequest
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
            'tag_id' => 'required|exists:method_tags,id',
            'name' => 'required|min:2',
            'type' => 'required|required|in:' . implode(',', Method::$types),
            'description' => 'required|min:5|max:1500',
            'return_type_id' => 'required|exists:types,id',
        ];
    }
}
