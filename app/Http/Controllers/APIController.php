<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class APIController extends Controller
{

    public function getWeatherForecast(Request $request){
      $city = $request->input('city', null);
      if(!$city){
        return $this->sendResponse("ERROR", "Invalid request.", "10001", null);
      }

      $location = $city.',jp';

      $api_request = env('OPEN_WEATHER_API');
      $api_data = [
        'q' => $location,
        'appid' => env('OPEN_WEATHER_APIKEY')
      ];
      $response = $this->sendRequest($api_request, $api_data)->collect();

      $response_forecasts = collect($response->get('list'));

      $forecasts = $response_forecasts->map(function($date, $key){
        return new Forecast($date);
      });

      $venues = $this->getVenueDetails($location);

      $return_data = ['forecasts' => $forecasts->toArray(), 'venues' => $venues->toArray()];

      Log::debug($return_data);

      return $this->sendResponse("SUCCESS", null, null, $return_data);
    }

    private function getVenueDetails($location){

      $api_request = env('FS_API');
      $api_data = [
        'client_id' => env('FS_CLIENT_ID'),
        'client_secret' => env('FS_CLIENT_SECRET'),
        'near' => $location,
        'v' => 20210101
      ];
      
      $response_venues = $this->sendRequest($api_request, $api_data)->collect()->get('response')['venues'];

      $venues = collect($response_venues)->map(function($venue, $key){
        return new Venue($venue);
      });

      return $venues;

      // return $this->sendResponse("SUCCESS", null, null, $response);
    }

    private function sendRequest($api, $params){
      return  Http::get($api, $params);
    }

    private function sendResponse($result, $message, $error_code=null, $data=null){
      return response()->json([
        'RESULT' => $result,
        'MESSAGE' => $message,
        'ERROR_CODE' => $error_code,
        'DATA' => $data
      ]);
    }
}
