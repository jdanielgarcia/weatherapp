<?php

namespace App\Models;

use Carbon\Carbon;

class Forecast
{
  // public $rawdata;
  public $date;
  public $time;
  public $min_temp;
  public $max_temp;
  public $description;
  public $pop;
  public function __construct(array $data = [])
  {
      $this->parse($data);
  }

  private function parse($date=[]){
    if(!empty($date)){
      // $this->rawdata = $date;
      $forecast_carbon = Carbon::createFromTimestamp($date['dt']);
      $this->date = $forecast_carbon->format('M d (D)');
      $this->time = $forecast_carbon->format('h:i A');
      $this->min_temp = $date['main']['temp_min'];
      $this->max_temp = $date['main']['temp_max'];
      $this->description = $date['weather'][0]['description'];
      $this->pop = number_format($date['pop'] * 100) . '%';
    }
  }
}
