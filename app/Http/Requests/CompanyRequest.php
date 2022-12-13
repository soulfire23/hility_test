<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|max:256',
            'email' => 'nullable|email|max:256',
            'website' => 'nullable|max:256',
            'logo' => 'image|mimes:jpg,jpeg,png,webp|dimensions:min_width=100,min_height=100|max:10240',
        ];
    }
}
