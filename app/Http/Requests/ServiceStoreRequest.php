<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'company_id' => ['required', 'integer', 'exists:companies,id', Rule::unique('services')->where('service_name', $this->name)],
            'price_netto' => ['required', 'numeric'],
            'vat' => ['required', 'integer'],
        ];
    }
}
