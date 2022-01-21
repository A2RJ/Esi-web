<?php

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::group(['prefix' => 'testing'], function () {
    Route::get('province', function () {
        $province = Province::all();
        return $province ? $province : [];
    });
    Route::get('regency/{id}', function ($id) {
        $regency = Province::find($id)->regencies;
        return $regency ? $regency : [];
    });
    Route::get('district/{id}', function ($id) {
        $district = Regency::find($id)->districts;
        return $district ? $district : [];
    });
    Route::get('village/{id}', function ($id) {
        $village = District::find($id)->villages;
        return $village ? $village : [];
    });
// });
