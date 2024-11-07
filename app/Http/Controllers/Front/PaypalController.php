<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductsAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use App\Models\Payment;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function paypal(){
        if (Session::has('order_id')){
            $orderDetails = Order::with('orders_products','user.ward','user.district','user.province','ward','district','province')->where('id',Session::get('order_id'))->first()->toArray();
            return view('front.paypal.paypal');
        } else {
            return redirect('/cart');
        }
    }
//
//    public function pay(Request $request){
//        try{
//            // $orderDetails = Order::where('id',Session::get('order_id'))->first()->toArray();
//            $paypal_amount = round(Session::get('grand_total')/80,2);
//            $response = $this->gateway->purchase(array(
//                'amount' => $paypal_amount,
//                'currency' => env('PAYPAL_CURRENCY'),
//                'returnUrl' => url('success'),
//                'cancelUrl' => url('error')
//            ))->send();
//            if ($response->isRedirect()) {
//                $response->redirect();
//            }else{
//                return $response->getMessage();
//            }
//        }catch (\Throwable $th) {
//            return $th->getMessage();
//        }
//    }

    public function pay(Request $request){
        try{
            // $orderDetails = Order::where('id',Session::get('order_id'))->first()->toArray();
            $paypal_amount = round(Session::get('grand_total') / 25000, 2);
            $response = $this->gateway->purchase(array(
                'amount' => $paypal_amount,
                'currency' => env('PAYPAL_CURRENCY'), // kiểm tra lại giá trị của PAYPAL_CURRENCY trong .env
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function success(Request $request){
        if ($request->input('paymentId') && $request->input('PayerID')) {
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
                $payment->save();
//                return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

                // Get the Order ID
                $order_id = Session::get('order_id');

                // Update Order Status to Payment Captured
                Order::where('id',$order_id)->update(['order_status'=>'Payment Captured']);

                $orderDetails = Order::with('orders_products','user.ward','user.district','user.province','ward','district','province')->where('id',$order_id)->first()->toArray();

                foreach ($orderDetails['orders_products'] as $key => $item) {
                    // Reduce Stock Scripts Start
                    $getProductstock = ProductsAttribute::productStock($item['product_id'],$item['product_size']);
                    $newStock = $getProductstock - $item['product_qty'];
                    ProductsAttribute::where(['product_id'=>$item['product_id'],'size'=>$item['product_size']])->update(['stock'=>$newStock]);
                    // Reduce Stock Scripts Ends
                }

                // Send Order Email
                $email = Auth::user()->email;
                $messageData = [
                    'email' => $email,
                    'name' => Auth::user()->name,
                    'order_id' => $order_id,
                    'orderDetails' => $orderDetails
                ];
                Mail::send('emails.order',$messageData,function ($message) use($email){
                    $message->to($email)->subject('Order Confirmed - DTSneaker');
                });

                // Empty the User Cart
                Cart::where('user_id',Auth::user()->id)->delete();

                return view('front.paypal.success');
            }else{
                return $response->getMessage();
            }
        }else{
//            return 'Payment declined!!';
            return view('front.paypal.fail');
        }
    }

    public function error()
    {
//        return 'User declined the payment!';
        return view('front.paypal.fail');
    }
}
