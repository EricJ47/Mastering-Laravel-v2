<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Services\SimpleService;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class SampleController extends Controller
{
// Without injection an instance of SimpleService class will be created in every request
    // public function index(Request $request, SimpleService $simpleService)
    // {

    //     $simpleService->log('this is test');

    //     $this->anotherMethod( $simpleService );
    //     return $request->all();

    // }

    // public function anotherMethod($para)
    // {app/Services/

    //     $para->log('this is another test log from another method');

    // }
    
// With injection an instance of SimpleService class will be created in every request
    // private $simpleService;
    // public function __construct(SimpleService $simpleService)
    // {
    //     $this->simpleService = $simpleService;
    // }


    // public function index(Request $request)
    // {

    //     $this->simpleService->log('this is test');

    //     $this->anotherMethod();
    //     return $request->all();

    // }

    // public function anotherMethod()
    // {

    //     $this->simpleService->log('this is another test log from another method');

    // }

    public function index(PaymentService $payment)
    {
        // $payment = new PaymentService();
        dd(app());
    }
}
