<?php
//This is Service file. You should write your logic in here
namespace App\Services;
use App\Models\Service;

class ServiceService
{
    public function __construct(private Service $service = new Service())
    {

    }

    public function setService(Service $service): self
    {
        $this->service = $service;
        return $this;
    }

    public function assignAttributes(string $name, int $company_id, float $price_netto, int $vat, bool $active = true): self
    {
        $this->service->service_name = $name;
        $this->service->company_id = $company_id;
        $this->service->price_netto = $price_netto;
        $this->service->vat = $vat;
        $this->service->active = $active;
        $this->service->save();
        return $this;
    }

    public function getService(): Service
    {
        return $this->service;
    }
}

?>
