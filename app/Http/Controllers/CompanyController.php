<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyDeleteRequest;
use App\Http\Requests\CompanyUpdateRequest;

use App\Http\Resources\CompanyResource;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\CompanyCollection;

use App\Models\Company;
Use App\Services\CompanyService;


class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        return response()->json(
            new CompanyCollection(Company::paginate(10))
        );
    }

    //Returns all services for specific company
    public function index_services(Company $company)
    {
        return response()->json(
            new ServiceCollection($company->GetServices()->paginate(10))
        );
    }

    public function store(CompanyStoreRequest $request)
    {
        $request = $request->validated();
        return response()->json(
            $this->companyService->store($request['name'], $request['nip'])
        );
    }

    public function show(Company $company)
    {
        return response()->json(
            new CompanyResource($company)
        );
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $request = $request->validated();
        return response()->json(
            $this->companyService->update(
                $request['name'],
                $request['nip'],
                $request['active'],
                $company)
        );
    }

    public function destroy(Company $company)
    {
        return response()->json(
            $this->companyService->destroy($company)
        );
    }
}
