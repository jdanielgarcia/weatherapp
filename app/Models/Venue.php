<?php

namespace App\Models;

use Carbon\Carbon;

class Venue
{
  // public $rawdata;
  public $name;
  public $address;
  public $categories;

  public function __construct(array $data = [])
  {
      $this->parse($data);
  }

  private function parse($venue=[]){
    if(!empty($venue)){
      // $this->rawdata = $date;
        $this->name = $venue['name'];
        $this->address = $venue['location']['formattedAddress'];
        $this->categories = collect($venue['categories'])->map(function($category, $key){
          $return_cat = [];
          $return_cat['name'] = $category['name'];
          $return_cat['plural'] = $category['pluralName'];
          $return_cat['short'] = $category['shortName'];
          $return_cat['icon_url'] = $category['icon']['prefix'].$category['icon']['suffix'];
          return $return_cat;
        });

    }
  }
}
