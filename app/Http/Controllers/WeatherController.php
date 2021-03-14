<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
  public function index(){
    return view('weather_forcast');
  }

  public function cityflicker(){
   return view('city_flicker');
  }
}
