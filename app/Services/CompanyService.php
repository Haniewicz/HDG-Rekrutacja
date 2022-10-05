<?php
//This is Service file. You should write your logic in here
namespace App\Services;
use App\Models\Company;

class CompanyService
{
    public function store(string $name, string $nip)
    {
        $company = new Company;
        $company['company_name'] = $name;
        $company['nip'] = $nip;
        if($company->save())
        {
            return 'Pomyślnie dodano firmę';
        }else{
            return 'Wystąpił nieoczekiwany błąd';
        }

    }

    public function update(string $name, string $nip, bool $active, object $company)
    {
        $company['company_name'] = $name;
        $company['nip'] = $nip;
        $company['active'] = $active;
        if($company->save())
        {
            return 'Pomyślnie zedytowano dane firmy';
        }else{
            return 'Wystąpił nieoczekiwany błąd';
        }
    }

    public function destroy(object $company)
    {
        if($company->delete())
        {
            return 'Pomyślnie usunięto firmę z bazy danych';
        }else{
            return 'Wystąpił nieoczekiwany błąd';
        }
    }
}

?>
