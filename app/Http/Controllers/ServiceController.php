<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;

use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceCollection;

use App\Services\ServiceService;
use App\Models\Service;

class ServiceController extends Controller
{

    protected $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        return response()->json(
            new ServiceCollection(Service::Paginate(10))
        );
    }

    public function store(ServiceStoreRequest $request)
    {
        $request = $request->validated();
        return response()->json(
            $this->serviceService->store(
                $request['name'],
                $request['company_id'],
                $request['price_netto'],
                $request['vat'])
        );
    }

    public function show(Service $service)
    {
        return response()->json(
            new ServiceResource($service)
        );
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $request = $request->validated();
        return response()->json(
            $this->serviceService->update(
                $request['name'],
                $request['company_id'],
                $request['price_netto'],
                $request['vat'],
                $request['active'],
                $service)
        );
    }

    public function destroy(Service $service)
    {
        return response()->json(
            $this->serviceService->destroy($service)
        );
    }
}
