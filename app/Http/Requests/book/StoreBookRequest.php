<?php

namespace App\Http\Requests\book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:256', 'min:2'],
            'author_name' => ['required', 'string', 'max:256', 'min:2'],
            'book_page_number' => ['required', 'integer', 'max:9999', 'min:3'],
            'code' => ['required', 'integer', 'min:1', 'unique:books'],
            'quantity' => ['required', 'integer', 'max:999', 'min:1'],
            'price' => ['required', 'numeric', 'max:99999.99', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'status' => ['required', 'integer', 'between:0,1'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'image' => ['required', 'max:1000', 'mimes:png,jpg,jpeg,webp'],
        ];
    }
}
