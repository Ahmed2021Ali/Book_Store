<?php

namespace App\Http\Requests\branch;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'city' => ['required', 'string', 'max:255','unique:branches'],
            'branch_number' => ['required', 'regex:/^01[0-2,5,9]{1}[0-9]{8}$/','unique:branches'],
            'address_detail' => ['required','string', 'max:255'],
            'status'=>['required','integer','between:0,1'],
        ];
    }
}
