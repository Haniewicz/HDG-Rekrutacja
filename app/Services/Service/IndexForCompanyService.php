<?php
//This is Service file. You should write your logic in here
namespace App\Services\Service;
use App\Models\Service;

class IndexForCompanyService
{
    function handle($company_id)
    {
        if(Service::Where('firma', $company_id)->count() > 0)
        {
            return response(Service::Where('firma', $company_id)->Paginate(10), 200);
        }else{
            return response('Ta firma nie posiada żadnych usług', 400);
        }
    }
}

?>
