<?php
//This is Service file. You should write your logic in here
namespace App\Services\Company;

use App\Models\Company;

class StoreService
{
    function handle($data)
    {
        $insert = Company::Create([
            'Nazwa firmy' => $data['name'],
            'NIP' => $data['nip'],
        ]);

        if($insert == true)
        {
            return response()->json('Pomyślnie dodano firmę', 200);
        }else{
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
}

?>
