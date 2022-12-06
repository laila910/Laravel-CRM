<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateUserRequest extends FormRequest
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
                'password' => 'sometimes|required',
                'email' => 'sometimes|required|email|unique:users,email,'.$this->user->id,
                'address' => 'sometimes|required|min:5|max:255',
                'image' => 'image|mimes:jpg,jpeg,png|sometimes|required',
                'admin'=>'sometimes|required'
            ];
        }else{
           
          return [
        'name' => 'required|min:3|max:255',
        'password' => 'required|min:5',
        'email' => 'required|email|unique:users,email,'.$this->user,
        'address' => 'nullable|min:5|max:255',
        'image' => 'image|mimes:jpg,jpeg,png|nullable',
        'admin'=>'sometimes|required'
           ];
       }
    }
}
