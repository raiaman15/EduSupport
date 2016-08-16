<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Paypal;

class PaypalController extends Controller
{

    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }

    public function payPremium($payplan,$id)
    {
    	return view('pages.payPremium')->with('payplan', $payplan)->with('id', $id);
    }

    public function getCheckout(Request $request)
	{
	    $payer = PayPal::Payer();
	    $payer->setPaymentMethod('paypal');

	    $amount = PayPal:: Amount();
	    $amount->setCurrency('USD');
	    $amount->setTotal($request->input('pay'));

	    $transaction = PayPal::Transaction();
	    $transaction->setAmount($amount);
	    $transaction->setDescription('Activate your assistance request with assistance ID '.$request->input('assistance_id').' for $'.$request->input('pay'));

	    $redirectUrls = PayPal:: RedirectUrls();
	    $redirectUrls->setReturnUrl(route('getDone'));
	    $redirectUrls->setCancelUrl(route('getCancel'));

	    $payment = PayPal::Payment();
	    $payment->setIntent('sale');
	    $payment->setPayer($payer);
	    $payment->setRedirectUrls($redirectUrls);
	    $payment->setTransactions(array($transaction));

	    $response = $payment->create($this->_apiContext);
	    $redirectUrl = $response->links[1]->href;

	    return redirect()->to( $redirectUrl );
	}

	public function getDone(Request $request)
	{
	    $id = $request->get('paymentId');
	    $token = $request->get('token');
	    $payer_id = $request->get('PayerID');

	    $payment = PayPal::getById($id, $this->_apiContext);

	    $paymentExecution = PayPal::PaymentExecution();

	    $paymentExecution->setPayerId($payer_id);
	    $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

	    
	    dd($executePayment);
	}

	public function getCancel()
	{
	    return redirect('study');
	}
}