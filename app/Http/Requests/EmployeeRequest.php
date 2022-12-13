<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|alpha|max:256',
            'last_name' => 'required|alpha|max:256',
            'email' => 'nullable|email|max:256',
            'phone' => 'nullable|numeric',
            'company_id' => 'nullable|numeric',
        ];
    }
}
