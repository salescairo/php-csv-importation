<?php

namespace App\Http\Controllers;

use App\Models\CustomerTariff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerTariffTariffController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $customerTariff =  CustomerTariff::paginate(15);
        return response()->json($customerTariff,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        $customerTariff = new CustomerTariff();
        $customerTariff->fill($request->all());
        $customerTariff->save();
        return response()->json($customerTariff,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id 
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) : JsonResponse
    {
        $customerTariff = CustomerTariff::find($id);
        if(!$customerTariff){
            return response()->json('TARIFA NÃO ENCONTRADA',404);
        }
        return response()->json($customerTariff,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id 
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse
    {
        $customerTariff = CustomerTariff::find($id);
        if(!$customerTariff){
            return response()->json('TARIFA NÃO ENCONTRADA',404);
        }
        $customerTariff->fill($request->all());
        $customerTariff->save();
        return response()->json($customerTariff,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id 
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) : JsonResponse
    {
        $customerTariff = CustomerTariff::find($id);
        if(!$customerTariff){
            return response()->json('TARIFA NÃO ENCONTRADA',404);
        }
        $customerTariff->delete();
        return response()->json(null,204);
    }
}
