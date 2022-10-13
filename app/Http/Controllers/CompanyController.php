<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\PaginationRequest;

use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyCollection;

use App\Models\Company;
Use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;


class CompanyController extends Controller
{


    public function __construct(private readonly CompanyService $companyService)
    {

    }

    public function index(PaginationRequest $request): JsonResponse
    {
        return response()->json(
            new CompanyCollection(Company::paginate($request->validated('count')))
        );
    }

    public function store(CompanyStoreRequest $request): JsonResponse
    {
        $request = $request->validated();
        $store = new CompanyResource($this->companyService->assignAttributes(
            data_get($request, 'name'),
            data_get($request, 'nip')
        )->getCompany());
        return response()->json(
            $store
        );
    }

    public function show(Company $company): JsonResponse
    {
        return response()->json(
            new CompanyResource($company)
        );
    }

    public function update(CompanyUpdateRequest $request, Company $company): JsonResponse
    {
        $request = $request->validated();
        $update = new CompanyResource($this->companyService->setCompany($company)
            ->assignAttributes(
                data_get($request, 'name'),
                data_get($request, 'nip'),
                data_get($request, 'active'),
            )->getCompany());
        return response()->json(
            $update
        );
    }

    public function destroy(Company $company): JsonResponse
    {
        return response()->json(
            $company->delete()
        );
    }
}
