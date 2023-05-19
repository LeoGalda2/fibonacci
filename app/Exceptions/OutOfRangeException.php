<?php

namespace App\Exceptions;

use Exception;

class OutOfRangeException extends Exception{

  protected $status;

  public function __construct($message, $status = 400){
      parent::__construct($message, $status);
      $this->status = $status;
  }

  /**
   * Report the exception.
   *
   * @return void
   */
  public function report(){
  }

  /**
   * Render the exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function render($request){    
    return response()->json([
      'success' => false,
      'status' => 400,
      'message' => $this->getMessage()
    ], 400);
  }
}
