<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Routes for Company operations
Route::apiResource('companies', CompanyController::class);
Route::apiResource('companies.services', ServiceController::class, [
    'only' => ['index']
]);
//Routes for service operations
Route::apiResource('services', ServiceController::class, [
    'except' => ['index']
]);
