<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeForm extends FormRequest
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
        if($this->method()=='PATCH'){
            return [
                'name' => 'required',
                'phone' =>'required|regex:/^([0-9]*)$/|min:10|unique:employees,phone', 
   
                'email'=>'required|email|regex:/^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/|unique:employees,email'
            ];
        }else{
            return [
                'name' => 'required',
                'phone' =>'required|regex:/^([0-9]*)$/|min:10|unique:employees,phone', 
   
                'email'=>'required|email|regex:/^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/|unique:employees,email'
            ];
        }
    }
    public function messages(){
        return[
            'name.required' => 'Please Enter Name',

            'email.required'=>'Please Enter Email.',
            'email.email'=>'Please Enter Valid Email Address.',
            'email.regex'=>'Please Enter Valid Email Address.',
            'email.unique'=>'Email Already Exists.',

            'phone.required'=>'Please Enter Contact Number.',
            'phone.digits'=>'Please Enter Valid Digits.',
            'phone.regex'=>'Please Enter Valid Digits.',
            'phone.min'=>'Contact Number Must be at least 10 digits.',
        ];
    }
}
