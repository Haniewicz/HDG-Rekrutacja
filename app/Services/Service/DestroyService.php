<?php
//This is Service file. You should write your logic in here
namespace App\Services\Service;
use App\Models\Service;

class DestroyService
{
    function handle($service_id)
    {
        $service = Service::Find($service_id);
        if($service !== null)
        {
            if($service->delete())
            {
                return response()->json('Pomyślnie usunięto usługę', 200);
            }else{
                return response()->json('Wystąpił nieoczekiwany błąd', 500);
            }
        }else {
            return response()->json('Usługa o takim ID nie istnieje', 400);
        }
    }
}

?>
