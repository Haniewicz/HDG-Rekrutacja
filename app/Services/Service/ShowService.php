<?php
//This is Service file. You should write your logic in here
namespace App\Services\Service;
use App\Models\Service;

class ShowService
{
    function handle($service_id)
    {
        $service = Service::find($service_id);
        if($service != null)
        {
            return response($service, 200);
        }else{
            return response('Usługa o takim ID nie istnieje', 400);
        }
    }
}

?>
