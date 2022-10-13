<?php
//This is Service file. You should write your logic in here
namespace App\Services;
use App\Models\Company;

class CompanyService
{
    public function __construct(private Company $company = new Company())
    {

    }

    public function setCompany(Company $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function assignAttributes(string $name, string $nip, bool $active = true): self
    {
        $this->company->company_name = $name;
        $this->company->nip = $nip;
        $this->company->active = $active;
        $this->company->save();
        return $this;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }
}

?>
