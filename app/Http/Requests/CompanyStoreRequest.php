<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'nip' => 'required|numeric|min_digits:10|max_digits:10|unique:companies',
        ];
    }
}
