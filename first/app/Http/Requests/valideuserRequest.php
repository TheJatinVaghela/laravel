<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class valideuserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'=>'required',
            'useremail'=>'required|email',
            'usercity'=>'required',
            'userage'=>'required|numeric|between:18,60'
        ];
    }

    public function messages(){
        return [
            'username.required' => 'username IS rEQuired' ,
            'useremail.required' => 'useremail IS rEQuired' ,
            'usercity.required' => 'usercity IS rEQuired' ,
            'userage.required' => 'userage IS rEQuired'
        ];
    }

    protected function prepareForValidation():void{
        $this->merge([
            // 'username'=>strtoupper($this->username),
            'username'=> Str::slug($this->username),
        ]);
    }
}
