<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolTitleRequest extends FormRequest
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
            'order_by' => 'required|numeric',
            'file'=> 'nullable|mimes:jpeg,bmp,png,gif',
        ];

    }

    public function attributes()
    {
        return [
            'order_by' => '排序',
            'file'=>'簽章檔',
        ];
    }
}
