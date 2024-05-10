<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
class PayPalController extends Controller
{
    private $gateway;
    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);
    }

    public function paypalPay(Request $request){
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('paypalSuccess/?userId='.auth()->user()->id.'&amount='.$request->amount),
                'cancelUrl' => url('paypalCancel')
            ))->send();
            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function paypalSuccess(Request $request){
        if ($request->input('userId') and $request->input('amount') and $request->input('paymentId') and $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->user_id = auth()->user()->id;
                $payment->save();

                if ($request->input('amount') == 5) {
                    $user = User::find($request->input('userId'));
                    $user->credits = $user->credits + 50;
                    $user->update();
                    return redirect('dashboard')->with('success_status', '50 Credits Updated Successfully');
                }
                if ($request->input('amount') == 9) {
                    $user = User::find($request->input('userId'));
                    $user->credits = $user->credits + 100;
                    $user->update();
                    return redirect('dashboard')->with('success_status', '100 Credits Updated Successfully');
                }
                if ($request->input('amount') == 20) {
                    $user = User::find($request->input('userId'));
                    $user->credits = $user->credits + 250;
                    $user->update();
                    return redirect('dashboard')->with('success_status', '250 Credits Updated Successfully');
                }
            }
        }
    }

    public function paypalCancel(){
        return redirect('dashboard')->with('failed_status', 'Payment Cancelled');
    }

}
