<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'company_id' => 'required|integer|exists:companies,id',
            'active' => 'required|integer|min:0|max:1',
            'price_netto' => 'required|numeric',
            'vat' => 'required|integer',
        ];
    }
}
