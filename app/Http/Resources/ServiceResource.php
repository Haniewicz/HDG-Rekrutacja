<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'service_name' => $this->service_name,
            'company_id' => $this->company_id,
            'price_netto' => $this->price_netto,
            'vat' => $this->vat,
            'active' => $this->active,
        ];
    }
}
