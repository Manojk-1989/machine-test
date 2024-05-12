<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company_name' => 'required|string',
            'company_description' => 'required|string',
            'company_contact_number' => 'required|string',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'annual_turnover' => 'required|numeric||between:0,999999999999999',
        ];
    }

    public function messages(): array
    {
        return [
            'annual_turnover.between' => 'The annual turnover must be between :min and :max.',
        ];
    }
}
