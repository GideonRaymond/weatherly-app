<?php

use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::middleware('auth:sanctum')->get('/weather', function () {
    $key = env('WEATHER_API_KEY', '');
    $lat = request('lat');
    $lng = request('lng');

    $response = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lng&   units=metric&appid=$key");

    dd($response->json());
    $response->throw(new HttpClientException('weather_service_failure'));

    return $response;
});
