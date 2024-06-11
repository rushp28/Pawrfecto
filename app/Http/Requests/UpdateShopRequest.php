<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vendor_id' => ['required', 'integer', 'unique:shops', 'exists:vendors,id'],
            'name' => ['required', 'string', 'max:64'],
            'description' => ['nullable', 'string', 'max:256'],
            'phone_number' => ['nullable', 'string', 'digits:10'],
            'street_address' => ['required', 'string', 'max:256'],
            'city' => ['required', 'string', 'max:128'],
            'state' => ['required', 'string', 'max:128'],
            'postal_code' => ['nullable', 'string', 'max_digits:10'],
        ];
    }
}
