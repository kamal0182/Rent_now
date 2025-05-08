<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Repositories\Concrats\RentalRepositoryInterface;


class StripeController extends Controller
{
    public $rentalRepository ;
     public function __construct(RentalRepositoryInterface $rentalRepository)
     {
        $this->rentalRepository = $rentalRepository ;
     }
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            Charge::create([
                'amount' => 1000, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
            ]);

            // Payment successful; store a success message in the session
            $request->session()->flash('success', 'Payment successful!');
            
            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            // Payment failed; store an error message in the session
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
    public function showChekout($id)
    {
         $rental = $this->rentalRepository->findById($id) ;
        return view('paiment',compact('rental'));
    }
}
