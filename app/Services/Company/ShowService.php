<?php
//This is Service file. You should write your logic in here
namespace App\Services\Company;
use App\Models\Company;

class ShowService
{
    function handle($company_id)
    {
        $company = Company::Find($company_id);
        if($company != null)
        {
            return response()->json($company);
        }else{
            return response()->json('Firma o takim ID nie istnieje', 400);
        }
    }
}

?>
