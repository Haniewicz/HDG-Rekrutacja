<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'company_id' => ['required','integer', 'exists:companies,id', Rule::unique('services')->ignore($this->service->id)->where('service_name', $this->name)],
            'active' => ['required', 'boolean'],
            'price_netto' => ['required', 'numeric'],
            'vat' => ['required', 'integer'],
        ];

    }
}
