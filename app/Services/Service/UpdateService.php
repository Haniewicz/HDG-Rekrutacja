<?php
//This is Service file. You should write your logic in here
namespace App\Services\Service;
use App\Models\Service;

class UpdateService
{
    function handle($data, $service_id)
    {
        if(Service::Where('Nazwa usługi', $data['name'])->Where('Firma', $data['company_id'])->count() == 0)
        {
            $service = Service::find($service_id);
            if($service != null)
            {
                $service['Nazwa usługi'] = $data['name'];
                $service['Firma'] = $data['company_id'];
                $service['Aktywna'] = $data['active'];
                $service['Cena netto'] = $data['price_netto'];
                $service['VAT'] = $data['vat'];
                $service->save();
                return response('Pomyślnie zedytowano dane usługi', 200);
            }else{
                return response('Usługa o takim ID nie istnieje', 400);
            }
        }else{
            return response('Ta firma posiada już taką usługę', 400);
        }
    }
}

?>
