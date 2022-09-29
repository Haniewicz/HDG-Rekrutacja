<?php
//This is Service file. You should write your logic in here
namespace App\Services\Company;

use App\Models\Company;

class UpdateService
{
    function handle($data, $company_id)
    {
        $company = Company::find($company_id);
        if($company != null)
        {
            $company['Nazwa firmy'] = $data['name'];
            $company['NIP'] = $data['nip'];
            $company['Aktywna'] = $data['active'];
            $company->save();
            return response()->json('Pomyślnie zedytowano dane firmy', 200);
        }else{
            return response()->json('Firma o takim ID nie istnieje', 400);
        }
    }
}

?>
