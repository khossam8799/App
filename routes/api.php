<?php

use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::post('states',[StateController::class,'store']);
Route::put('states/{id}',[StateController::class,'update']);
Route::delete('states/{id}', [StateController::class,'delete']);
Route::get('states',[StateController::class , 'count']);

Route::post('cities', [CityController::class ,'store']);
Route::put('cities/{id}',[CityController::class, 'update']);
Route::delete('cities/{id}', [CityController::class ,'delete']);
Route::get('cities/{id}',[CityController::class , 'countCitiesOfState']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



