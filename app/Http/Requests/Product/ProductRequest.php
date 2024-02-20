<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
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
            'name' =>'required',
            'price' => 'required|numeric|min:0',
            'price_sale' => 'nullable|numeric|lt:price', // It là kiểm tra giá giảm phải nhỏ hơn giá gốc
            'thumb' => 'required',
          
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không bỏ trống',
            'price.required' => 'Giá sản phẩm không bỏ trống',
            'price_sale.lt' => 'Giá giảm phải nhỏ hơn giá gốc',
            'thumb.required' => 'Không được trống',
            
        ];
    }
    
}
