<?php

namespace App\Http\Controllers;
use PaytmWallet;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
class PaytmController extends Controller
{
    public function order()
    {
        $user = Auth::user();
        $order = Order::where([['user_id',$user->id],["ordered",false]])->first();

        $payment = PaytmWallet::with('receive');
        $id = rand(1, 999);
        $payment->prepare([
          'order' => $order->id . $id,
          'user' => $user->id,
          'mobile_number' => $order->address->contact,
          'email' => $user->email,
          'amount' => 1,
          'callback_url' => route('paymentCallback')
        ]);

        //storeing payment details
        $pay = new Payment();
        $pay->txnid = NULL;
        $pay->user_id = $user->id;
        $pay->orderid = $order->id . $id;
        $pay->banktxnid = NULL;
        $pay->txnamount = 1;
        $pay->status = NULL;
        $pay->txndate = NULL;
        $pay->paymentmode = NULL;
        $pay->save();


        return $payment->receive();
    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $user = Auth::user();
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();
        // print_r($response['BANKTXNID']);
        $pay = Payment::where('orderid',$transaction->getOrderId())->first();
        $pay->txnid = $transaction->getTransactionId();
        $pay->banktxnid = $response['BANKTXNID'];
        $pay->status = $response['STATUS'];
        $pay->txndate = $response['TXNDATE'];
        $pay->paymentmode = $response['PAYMENTMODE'];
        $pay->save();

        // if($transaction->isSuccessful()){

        // }else if($transaction->isFailed()){
        //   //Transaction Failed
        // }else if($transaction->isOpen()){
        //   //Transaction Open/Processing
        // }
       echo "<br>" . $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        echo "<br>". $transaction->getOrderId(); // Get order id
        echo "<br>". $transaction->getTransactionId(); // Get transaction id


    }
}
