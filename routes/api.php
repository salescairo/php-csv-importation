<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('customers',[App\Http\Controllers\CustomerController::class])->names('customers');