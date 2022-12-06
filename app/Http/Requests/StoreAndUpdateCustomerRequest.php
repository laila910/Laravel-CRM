<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateCustomerRequest extends FormRequest
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
                'name' => 'sometimes|required|min:3|max:255',
                'email' => 'sometimes|required|email',
                'phone'=>'sometimes|required',
                'company' => 'sometimes|required|min:5|max:255',
                'website' => 'sometimes|required|min:5|max:255',
                'createdBy'=>'sometimes|required|exists:App\Models\User,id',
                'user_id'=>'sometimes|required|exists:App\Models\User,id',
            ];
        }else{
           
          return [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'phone'=>'required',
        'company' => 'required|min:5|max:255',
        'website' => 'required|min:5|max:255',
        'user_id'=>'required|exists:App\Models\User,id',
           ];
         
       }
    }
}
