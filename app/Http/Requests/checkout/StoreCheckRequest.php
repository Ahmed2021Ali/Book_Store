<?php

namespace App\Http\Requests\checkout;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckRequest extends FormRequest
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
            'status'=>['required'],
            'fname'=>['required','string','max:256','min:2'],
            'lname'=>['required','string','max:256','min:2'],
            'city'=>['required','string','max:256','min:2'],
            'phone' => ['required'],
            'address' => ['required','string', 'max:255'],
            'email' => ['required','email']
        ];
    }
}
