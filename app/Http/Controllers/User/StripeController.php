<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function StripeOrder(Request $request) {

        \Stripe\Stripe::setApiKey('sk_test_51KMxvPHAj52WZd9SJJI2sflmAzF2pTcnXdtqlGI49ErlRVJdyqOCqevjWeuNHsTW3k5cIH7QOn89vmsVhQ1tJR6R00yAwrOrrw');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999,
            'currency' => 'usd',
            'description' => 'Easy Online Store',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);
        dd($charge);
    } // end method
}
