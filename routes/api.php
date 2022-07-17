<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('customers',App\Http\Controllers\CustomerController::class)->names('customers');

Route::apiResource('tariffs',App\Http\Controllers\CustomerTariffController::class)->names('tariffs');
Route::post('import/{customer}',[App\Http\Controllers\CustomerTariffController::class,'import'])->name('tariffs.import');