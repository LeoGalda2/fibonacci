<?php

use App\Services\FibonacciServices;
use Tests\TestCase;

class FibonacciTest extends TestCase{

  public function test_that_sevice_fibonacci_returns_a_successful_response(){
    $fibonacciService = new FibonacciServices();
    $this->assertEquals($fibonacciService->getResult(0), 0);
    $this->assertEquals($fibonacciService->getResult(1), 1);
    $this->assertEquals($fibonacciService->getResult(2), 1);
    $this->assertEquals($fibonacciService->getResult(3), 2);
    $this->assertEquals($fibonacciService->getResult(8), 21);
    $this->assertEquals($fibonacciService->getResult(20), 6765);
  }

  public function test_endpoint_returns_code_200(){    
    $this->json('GET','fibonacci/0')->assertResponseStatus(200);
    $this->json('GET','fibonacci/1')->assertResponseStatus(200);
    $this->json('GET','fibonacci/2')->assertResponseStatus(200);
    $this->json('GET','fibonacci/3')->assertResponseStatus(200);
  }

  public function test_endpoint_value_outside_range_returns_code_400(){
    $this->json('GET','fibonacci/-21')->assertResponseStatus(400);
    $this->json('GET','fibonacci/7800')->assertResponseStatus(400);
  }

}

