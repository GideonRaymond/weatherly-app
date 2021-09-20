<?php

namespace App\Http\Middleware;

use Exception;
use GeoIp2\Exception\HttpException;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Middleware;
use Stevebauman\Location\Facades\Location;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $location = Location::get();
        if (!$location) {
            throw new Exception('location_service_failure');
        }

        $key = env('WEATHER_API_KEY', '');

        $lat = $location->latitude;
        $lng = $location->longitude;

        $locationArray = [
            'countryCode' => $location->countryCode,
            'regionCode' => $location->regionCode,
            'cityName' => $location->cityName,
            'lat' => $lat,
            'lng' => $lng,
        ];


        $weather = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lng&units=metric&appid=$key");
        $weather->throw(new HttpClientException('weather_service_failure'));

        $weatherArray = [
            'current' => $weather['current'],
            'daily' => $weather['daily'],
            'hourly' => $weather['hourly'],
            'minutely' => $weather['minutely'],
        ];
        return array_merge(parent::share($request), [
            'location' => $locationArray,
            'weather' => $weatherArray
        ]);
    }
}
