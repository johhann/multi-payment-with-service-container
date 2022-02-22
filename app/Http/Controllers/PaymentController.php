<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(OrderDetail $orderDetail, PaymentGatewayContract $paymentGateway)
    {

        return [
            'orders' => $orderDetail->details(),
            'payment' => $paymentGateway->charge(700)
        ];
    }
}
