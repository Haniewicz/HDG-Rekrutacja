<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Requests\PaginationRequest;

use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceCollection;

use App\Services\ServiceService;
use App\Models\Service;
use App\Models\Company;

class ServiceController extends Controller
{

    public function __construct(private readonly ServiceService $serviceService)
    {

    }

    public function index(PaginationRequest $request, Company $company): JsonResponse
    {
        return response()->json(
            new ServiceCollection($company->services()->paginate($request->validated('count')))
        );
    }

    public function store(ServiceStoreRequest $request): JsonResponse
    {
        $request = $request->validated();

        $service = $this->serviceService->assignAttributes(
            data_get($request, 'name'),
            data_get($request, 'company_id'),
            data_get($request, 'price_netto'),
            data_get($request, 'vat'),
        )->getService();

        return response()->json(
            new ServiceResource($service)
        );
    }

    public function show(Service $service): JsonResponse
    {
        return response()->json(
            new ServiceResource($service)
        );
    }

    public function update(ServiceUpdateRequest $request, Service $service): JsonResponse
    {
        $request = $request->validated();

        $service = $this->serviceService->setService($service)->assignAttributes(
            data_get($request, 'name'),
            data_get($request, 'company_id'),
            data_get($request, 'price_netto'),
            data_get($request, 'vat'),
            data_get($request, 'active'),
        )->getService();

        return response()->json(
            new ServiceResource($service)
        );
    }

    public function destroy(Service $service): JsonResponse
    {
        return response()->json(
            $service->delete()
        );
    }
}
