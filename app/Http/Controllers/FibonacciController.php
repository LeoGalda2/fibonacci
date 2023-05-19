<?php

namespace App\Http\Controllers;

use App\Services\FibonacciServices;
use App\Exceptions\OutOfRangeException;

class FibonacciController extends Controller{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }

    /**
     *  @OA\Get(
     *      path="/fibonacci/{value}",
     *      tags={"Fibonacci"},
     *      @OA\Response(response="200", description="returns the value of calculating the fibonacci sequence"),
     *      @OA\Parameter(
     *          name="value",
     *          description="desired value to calculate",
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *      )
     * )
     */


    public function showResult($value){ 
        if($value > MAX_VALUE_TO_PROCESS_FIBONACCI || $value < 0){
            throw new OutOfRangeException("$value is outside the allowed range, choose a number between 0 and " . MAX_VALUE_TO_PROCESS_FIBONACCI);            
        }       
        return (new FibonacciServices())->getResult($value);
    }
}
