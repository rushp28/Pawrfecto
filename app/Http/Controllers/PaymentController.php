<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $paypalConfig = config('paypal');

        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($paypalConfig['client_id']);
        $this->gateway->setSecret($paypalConfig['secret']);
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase([
                'amount' => $request->cart_total,
                'currency' => env('PAYPAL_CURRENCY'),
                'shipping_address' => $request->shipping_address,
                'billing_address' => $request->billing_address,
                'returnUrl' => route('payment.success'),
                'cancelUrl' => url('payment.cancel'),
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else {
                return response()->json(['error' => $response->getMessage()], 400);
            }
        }
        catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function handleSuccess(Request $request)
    {
        $transaction = $this->gateway->completePurchase([
            'payerId' => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId'),
        ]);

        $response = $transaction->send();

        if ($response->isSuccessful()) {
            // Payment was successful
            $data = $response->getData();

            $cart = auth()->user()->customer->carts->first()->with('products')->first();

            // Create an order in the database
            $order = Order::create([
                'customer_id' => auth()->user()->customer->id, // Assuming you have authentication and storing the current user ID
                'order_id' => $data['id'], // Assuming PayPal provides an order ID
                'payment_id' => $data['transactions'][0]['related_resources'][0]['sale']['id'], // Adjust this based on PayPal's response
                'order_date' => now(), // Adjust according to your requirements
                'product_count' => $cart->product_count, // Initialize product count, adjust according to your needs
                'sub_total' => $data['transactions'][0]['amount']['details']['subtotal'], // Assuming PayPal provides subtotal
                'total_discount' => $cart->total_discount, // Initialize total discount, adjust according to your needs
                'total_tax' => $cart->total_tax, // Assuming PayPal provides tax
                'total' => $data['transactions'][0]['amount']['total'], // Assuming PayPal provides total
            ]);

            $cart->products()->detach();
            $cart->update([
                'product_count' => 0,
                'sub_total' => 0,
                'total_discount' => 0,
                'total_tax' => 0,
                'total' => 0,
            ]);

            return redirect()->route('dashboard')->with('success', 'Payment successful. Order created.');
        } else {
            return redirect()->route('dashboard')->with('error', $response->getMessage());
        }
    }

    public function handleCancel()
    {
        return redirect()->route('carts.index')->with('error', 'Payment was cancelled.');
    }
}
