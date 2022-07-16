<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $customers =  Customer::paginate(15);
        return response()->json($customers,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save();
        return response()->json($customer,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id 
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) : JsonResponse
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json('CLIENTE NÃO ENCONTRADO',404);
        }
        return response()->json($customer,200);
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
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json('CLIENTE NÃO ENCONTRADO',404);
        }
        $customer->fill($request->all());
        $customer->save();
        return response()->json($customer,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id 
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) : JsonResponse
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json('CLIENTE NÃO ENCONTRADO',404);
        }
        $customer->delete();
        return response()->json(null,204);
    }
}
