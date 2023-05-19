<?php

namespace App\Services;

use Illuminate\Support\Arr;


class FibonacciServices {

  private $storages;

  public function __construct(){
    $this->storages = [];
  }

  public function getResult($value){
    if($value <= 1){
      return $value;
    } 
/*     if(array_key_exists($this->storages, $value)){*/
    if(!isset($this->storages[$value])){
      $firstFibonacciValue = $this->getResult($value - 1);
      $secondFibonacciValue = $this->getResult($value - 2);
      $this->storages = Arr::add($this->storages,$value, $firstFibonacciValue + $secondFibonacciValue);   
    }
    return Arr::get($this->storages, $value);    
  }

}