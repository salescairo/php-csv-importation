<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerController extends Controller
{
    public function index() : JsonResponse
    {
        $customers =  Customer::paginate(15);
        return response()->json($customers,200);
    }

    public function store(Request $request) : JsonResponse
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();
        return response()->json($customer,201);
    }

    public function show(Customer $customer) : JsonResponse
    {
        return response()->json($customer,200);
    }

    public function update(Request $request, Customer $customer) : JsonResponse
    {
        $customer->fill($request->all());
        $customer->save();
        return response()->json($customer,200);
    }

    public function destroy(Customer $customer) : JsonResponse
    {
        $customer->delete();
        return response()->json(null,204);
    }
}
