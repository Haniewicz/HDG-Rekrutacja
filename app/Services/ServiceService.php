<?php
//This is Service file. You should write your logic in here
namespace App\Services;
use App\Models\Service;

class ServiceService
{

    public function store(string $name, int $company_id, mixed $price_netto, int $vat)
    {
        $service = new Service;
        $service['service_name'] = $name;
        $service['company_id'] = $company_id;
        $service['price_netto'] = $price_netto*100;
        $service['vat'] = $vat;

        if($service->save())
        {
            return 'Pomyślnie dodano usługę';
        }else{
            return 'Wystąpił nieoczekiwany błąd';
        }
    }

    public function update(string $name, int $company_id, mixed $price_netto, int $vat, bool $active, object $service)
    {
        $service['service_name'] = $name;
        $service['company_id'] = $company_id;
        $service['active'] = $active;
        $service['price_netto'] = $price_netto*100;
        $service['vat'] = $vat;
        if($service->save())
        {
            return 'Pomyślnie zedytowano dane usługi';
        }else{
            return 'Usługa o takim ID nie istnieje';
        }
    }

    public function destroy(object $service)
    {
        if($service->delete())
        {
            return 'Pomyślnie usunięto usługę';
        }else{
            return 'Wystąpił nieoczekiwany błąd';
        }
    }
}

?>
