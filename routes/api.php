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
Route::POST('add_company', [CompanyController::class, 'store']);
Route::GET('company/{company_id}', [CompanyController::class, 'show']);
Route::GET('companies', [CompanyController::class, 'index']);
Route::PUT('update_company/{company_id}', [CompanyController::class, 'update']);
Route::DELETE('delete_company/{company_id}', [CompanyController::class, 'destroy']);

//Routes for service operations
Route::POST('add_service', [ServiceController::class, 'store']);
Route::GET('service/{service_id}', [ServiceController::class, 'show']);
Route::GET('services', [ServiceController::class, 'index']);
Route::GET('services/{company_id}', [ServiceController::class, 'index_for_company']);
Route::PUT('update_service/{service_id}', [ServiceController::class, 'update']);
Route::DELETE('delete_service/{service_id}', [ServiceController::class, 'destroy']);
