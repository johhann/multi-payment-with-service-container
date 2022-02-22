<?php

namespace App\Billing;

use Illuminate\Support\Str;

class MobileBankingPayment implements PaymentGatewayContract{

    private $amount;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function charge($amount)
    {
        // charge the bank here

        $discount = $amount * 0.05;

        return [
            'amount' => $amount - $discount,
            'discount' => $discount,
            'type' => 'Mobile Payment',
            'currency' => $this->currency,
            'transaction' => Str::random(10),
        ];

    }


}
