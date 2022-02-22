<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetail{

    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function details()
    {
        $this->paymentGateway->setDiscount(10);

        return [
            'name' => "John",
            'item' => 'Laptop',
        ];

    }


}
