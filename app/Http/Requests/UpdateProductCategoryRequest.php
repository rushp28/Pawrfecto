<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCategoryRequest extends FormRequest
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
        $rules = [
            'parent_product_category_id' => ['required', 'integer', 'exists:product_categories,id'],
            'name' => ['required', 'string', 'max:128'],
            'description' => ['nullable', 'string', 'max:256'],
            'is_active' => ['required', 'boolean'],
        ];

        if ($this->isMethod('post')) {
            $rules['name'][] = 'unique:product_categories,name';
        }
        elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'][] = Rule::unique('product_categories', 'name')->ignore($this->route('product_category'));
        }

        return $rules;
    }
}
