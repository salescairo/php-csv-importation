<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Jobs\TarrifsPreparation;
use App\Models\Customer;
use App\Models\CustomerTariff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerTariffController extends Controller
{


    public function index(): JsonResponse
    {
        $customerTariff =  CustomerTariff::paginate(15);
        return response()->json($customerTariff, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $customerTariff = new CustomerTariff();
        $customerTariff->fill($request->all());
        $customerTariff->save();
        return response()->json($customerTariff, 201);
    }

    public function show(CustomerTariff $customerTariff): JsonResponse
    {
        return response()->json($customerTariff, 200);
    }

    public function update(Request $request, CustomerTariff $customerTariff): JsonResponse
    {
        $customerTariff->fill($request->all());
        $customerTariff->save();
        return response()->json($customerTariff, 200);
    }

    public function destroy(CustomerTariff $customerTariff): JsonResponse
    {
        $customerTariff->delete();
        return response()->json(null, 204);
    }

    public function import(ImportRequest $request, Customer $customer): JsonResponse
    {
        TarrifsPreparation::dispatch($customer, $request->file('csv')->store('temp'))->delay(now());
        return response()->json('PROCESSO DE IMPORTAÇÃO FOI INICIADO', 200);
    }
}
