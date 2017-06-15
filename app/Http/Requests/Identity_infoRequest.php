<?php

namespace App\Http\Requests;

use App\Identity_info;
use Illuminate\Foundation\Http\FormRequest;

class Identity_infoRequest extends FormRequest
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
     public function messages()
{
    return [
        //'required' => 'กรุณาใส่ข้อมูลในช่องที่มี * ให้ครบ',
        
    ];
}
    public function rules()
    {
        return [
            'year'=>'required',
            'date'=>'required',
            'id_p'=>'required',
            'prefix'=>'required',
            'name'=>'required',
            'money'=>'required',
            'forwhat'=>'required',
            
            
            
        ];
    }
}
