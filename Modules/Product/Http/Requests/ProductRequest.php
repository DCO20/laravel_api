<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'image',
            'active' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = 'nullable|image';
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
