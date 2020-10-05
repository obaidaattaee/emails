<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
//        dd($this->all());
        $id = $this->route('product');

		return [
            'title' => 'required|unique:categories,title,'.$id.',id',
            'old_price' => 'required',
            'new_price' => 'required',
            'size' => 'required',
            'imageFile' => 'image',
            'description' => 'min:10',
            'category_id' => 'required',
            'brand_id' => 'required',

		];
    }
}
