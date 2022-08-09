<?php

namespace App\Http\Controllers;
use Session;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
       
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $intent = Stripe\PaymentIntent::create ([
                "amount" => 100*100,
                "currency" => "INR",
                "description" => "This payment is testing purpose of websolutionstuff.com",
        ]);
echo "<pre/>";
        print_r($intent);
        die;
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}
