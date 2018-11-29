<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard()->check());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|string|max:255|min:3',
            'product_description' => 'max:255',
            'product_qty' => 'required',
            'product_category' => 'exists:product_categories,id',
            'product_brand'=>'exists:brands,id',
            'product_price' => 'required',
        ];
    }
}
