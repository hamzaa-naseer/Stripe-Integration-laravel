<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;


class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create([
            'amount' => 100*100,
            'currency' => 'usd',
            'description' => 'test payment for 100$',
            'source' => $request->stripeToken,
            // dd($request->stripeToken),
        ]);

        return back()->with('success', 'Payment successful!');
    }


}
