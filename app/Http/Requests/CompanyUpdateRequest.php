<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'nip' => ['required', 'numeric', 'min_digits:10', 'max_digits:10', Rule::unique('companies')->ignore($this->company->id)],
            'active' => ['required', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'nip.unique' => 'Firma z takim numerem nip już istnieje',
        ];
    }
}
