<?php

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*
* 
* API v1
* 
**/


Route::group(['prefix' => 'v1'], function () {  
 Route::post('/post-provincies', [\App\Http\Controllers\API\V1\ProvincieController::class,'storeMassive']);
 Route::post('/post-municipalities', [\App\Http\Controllers\API\V1\MunicipalityController::class,'storeMassive']);

 Route::apiResources([
    'provincies' => \App\Http\Controllers\API\V1\ProvincieController::class,
    'municipalities' => \App\Http\Controllers\API\V1\MunicipalityController::class,
    'neighborhoods' => \App\Http\Controllers\API\V1\NeighborhoodsController::class,
 ]);
});  

