<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:product_categories,id',
            'slug' => 'required|string|max:255|unique:product_categories',
            'status' => 'required|in:active,inactive',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ];
    }
}
