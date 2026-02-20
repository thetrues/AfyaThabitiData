<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/data', [ApiController::class, 'getDataFromDW']);

Route::get('/facilities-by-region', [ApiController::class, 'getFacilitiesByRegion']);
Route::get('/councils-by-region', [ApiController::class, 'getCouncilsByRegion']);
Route::get('/facilities-by-region-and-council', [ApiController::class, 'getFacilitiesByRegionAndCouncil']);

Route::post('/import-org', [ApiController::class, 'importOrg']);
Route::get('/org-data', [ApiController::class, 'getOrgData']);