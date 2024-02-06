<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống',
            'thumb.required' => 'Không được bỏ trống',
            'url.required' => 'Không được bỏ trống'
        ];
    }
}
