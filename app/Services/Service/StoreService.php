<?php
//This is Service file. You should write your logic in here
namespace App\Services\Service;
use App\Models\Service;

class StoreService
{
    function handle($data)
    {
        if(Service::Where('Nazwa usługi', $data['name'])->Where('Firma', $data['company_id'])->count() == 0)
        {
            $insert = Service::Create([
                'Nazwa usługi' => $data['name'],
                'Firma' => $data['company_id'],
                'Cena netto' => $data['price_netto'],
                'VAT' => $data['vat'],
            ]);

            if($insert == true)
            {
                return response()->json('Pomyślnie dodano usługę', 200);
            }else{
                return response()->json('Wystąpił nieoczekiwany błąd', 500);
            }
        }else{
            return response()->json('Ta firma posiada już taką usługę', 400);
        }
    }
}

?>
