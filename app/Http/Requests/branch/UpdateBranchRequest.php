<?php

namespace App\Http\Requests\branch;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
           //   $id = $this->id;
        return [
            'city' => ['required', 'string', 'max:255'],
            'branch_number' => ['required', 'regex:/^01[0-2,5,9]{1}[0-9]{8}$/'],
            'address_detail' => ['required','string', 'max:255'],
            'status'=>['required','integer','between:0,1'],
        ];
    }
}
