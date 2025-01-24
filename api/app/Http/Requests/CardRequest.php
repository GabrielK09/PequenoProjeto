<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
        if($this->isMethod('put'))
        {
            return [ 
                'user_id' => 'required',
                'title' => 'sometimes',
                'description' => 'sometimes',
                'group' => 'nullable|required_without:contact',
                'contact' => 'nullable|required_without:group',
                'status' => 'sometimes',
                'file' => 'sometimes'

            ];

        }

        $rules = [
            'user_id' => 'required',
            'title' => 'required',
            'group' => 'nullable|required_without:contact',
            'contact' => 'nullable|required_without:group',
            'description' => 'required',
            'file' => 'required',
            
        ];
        
        return $rules;
    }
}
