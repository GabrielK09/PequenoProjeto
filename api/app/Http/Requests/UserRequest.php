<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'call' => 'sometimes|integer',
            ];
        }

        if($this->isMethod('post'))
        {
            return [
                'name' => 'sometimes|string',
                'login' => 'sometimes|string',
                'password' => 'sometimes|string',
                'start' => 'sometimes|date',
                'end' => 'sometimes|date'

            ];
        }
    }
}
