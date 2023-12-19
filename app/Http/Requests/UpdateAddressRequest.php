<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname'=>['required','string','max:256','min:2'],
            'lname'=>['required','string','max:256','min:2'],
            'city'=>['required','string','max:256','min:2'],
            'phone' => ['required'],
            'address' => ['required','string', 'max:255'],
            'email' => ['required','email'],
            'note'=>['nullable','string']
        ];
    }
}
