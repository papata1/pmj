<?php

namespace App\Http\Requests;

use App\debt_record_result;
use Illuminate\Foundation\Http\FormRequest;

class Debt_record_resultRequest extends FormRequest
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
        'contect_id.required' => 'กรุณากรอกเลขที่สัญญา',
        'no.required' => 'กรุณากรอกเลขรหัสผู้กู้',
        'date_loan.required' => 'กรุณากรอกวันเริ่มนับยอดกู้',
        
    ];
}
    public function rules()
    {
        return [
            'contect_id'=>'required',
            'no'=>'required',
            'date_loan'=>'required',

        ];
    }
}
