<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LifeBalanceRequest extends FormRequest
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
            'work' => 'required',
            'rest' => 'required',
            'relationship' => 'required',
            'career' => 'required',
            'family' => 'required',
            'fun' => 'required',
            'health' => 'required',
            'personal_dev' => 'required',
            'friends' => 'required',
            'finances' => 'required',
        ];
    }
}
