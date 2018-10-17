<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherManageRequest extends FormRequest
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
            'person_id' =>'nullable|tw_id',
            'email'=>'nullable|email',
            'cell_number'=>'nullable|numeric',
            'birthday'=>'nullable|date',
        ];
    }

    public function attributes()
    {
        return [
            'person_id'=>'身分證號',
            'cell_number'=>'手機號碼',
            'birthday'=>'生日',
        ];
    }

    public function messages()
    {
        return [
            'person_id.tw_id' => ':attribute 為非法字號',
            'birthday.date' => ':attribute 格式不對',
        ];
    }

}
