<?php

namespace App\Services;

class PaymentService
{
    public $gateway;
    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->gateway = $paymentGateway;
        
    }
    public function process()
    {
        return $this->gateway->execute();
    }
}