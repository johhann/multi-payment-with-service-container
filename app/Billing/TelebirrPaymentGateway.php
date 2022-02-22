<?php

namespace App\Billing;

use Illuminate\Support\Str;

class TelebirrPaymentGateway implements PaymentGatewayContract{

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

        $discount = $amount * 0.1;

        return [
            'amount' => $amount - $discount,
            'discount' => $discount,
            'type' => 'Telebirr Payment',
            'currency' => $this->currency,
            'transaction' => Str::random(10),
        ];
    }
}
