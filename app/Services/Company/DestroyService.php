<?php
//This is Service file. You should write your logic in here
namespace App\Services\Company;
use App\Models\Company;

class DestroyService
{
    function handle($company_id)
    {
        $company = Company::Find($company_id);
        if($company !== null)
        {
            if($company->delete())
            {
                return response('Pomyślnie usunięto firmę', 200);
            }else{
                return response('Wystąpił nieoczekiwany błąd', 500);
            }
        }else {
            return response('Firma o takim ID nie istnieje', 400);
        }
    }
}

?>
