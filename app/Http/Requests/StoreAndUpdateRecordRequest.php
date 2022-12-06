<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateRecordRequest extends FormRequest
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
        if($this->method()=='PUT'){
         
            return [
                'status' => 'sometimes|required',
                'notes' => 'sometimes|required|min:3|max:255',
                'customer_id'=>'sometimes|required|exists:App\Models\Customer,id'
            ];
        }else{
           
          return [
        'status' => 'required',
        'notes' => 'required|min:3|max:255',
        'customer_id'=>'required|exists:App\Models\Customer,id'
           ];
         
       }
    }
}
