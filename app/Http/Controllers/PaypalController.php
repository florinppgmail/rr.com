<?php

namespace App\Http\Controllers;

use Fahim\PaypalIPN\PaypalIPNListener;
use Illuminate\Support\Facades\Log;
use App\Payment;
use App\VendorPayStatus;
use App\User;

class PaypalController extends Controller {

    public function index()
    {
        $ipn = new PaypalIPNListener();
        $ipn->use_sandbox = false;

        $verified = $ipn->processIpn();
        // $report = $ipn->getTextReport();


        Log::info('Paypal was here again');

        if ($verified) {

            //if ($_POST['address_status'] == 'confirmed') {
                // Check outh POST variable and insert your logic here

                if(isset($_POST['txn_type'])) {
                    if($_POST['txn_type'] =='subscr_cancel') {

                        $current_user = User::where('subscriber_number', $_POST['subscr_id'])->first();
                        $vendor_pay_status = VendorPayStatus::where('user_id', $current_user->id)->first();

                        $vendor_pay_status->status = 2;
                        $vendor_pay_status->save();


                        // Subscription Cancelled (could still be active)
                    }

                    if($_POST['txn_type'] == 'subscr_eot') {

                        $current_user = User::where('subscriber_number', $_POST['subscr_id'])->first();
                        $vendor_pay_status = VendorPayStatus::where('user_id', $current_user->id)->first();
                        $vendor_pay_status->status = 3;
                        $vendor_pay_status->save();

                        // Subscription has ended (unpaid)
                    }
                }




                if (isset($_POST['payment_status'])) {

                    if ($_POST['payment_status'] == 'Completed') {

                        $vendor_id = (int)$_POST['custom'];
//
                        $payment = new Payment;
                        $payment->user_id = $vendor_id;

                        if (isset($_POST['payment_gross'])) {
                            $payment_amount = $_POST['payment_gross'];
                            $payment->amount = (float)$payment_amount;

                            // Amount paid
                        }

                        if (isset($_POST['txn_id'])) {
                            $transaction_number = $_POST['txn_id'];
                            $payment->transaction_id = $transaction_number;
                            // Transaction ID
                        }

                        if (isset($_POST['payer_email'])) {
                            $payer_email = $_POST['payer_email'];
                            $payment->paypal_address = $payer_email;
                            // The e-mail of person who paid (their paypal address)
                        }

                        if (isset($_POST['payment_date'])) {
                            $payment_date = $_POST['payment_date'];
                            $payment->datetime_paid = date('Y-m-d H:i:s',strtotime($payment_date));

                            // The date they paid
                        }

                        $payment->save();

                        $current_user = User::where('id', (int)$vendor_id)->first();


                        if (isset($_POST['subscr_id'])) {
                            $subscriber_number = $_POST['subscr_id'];
                            $current_user->subscriber_number = $subscriber_number;
                        }

                        $current_user->initial_vendor_payment = true;
                        $current_user->save();

                        $vendor_pay_status = VendorPayStatus::where('user_id', (int)$vendor_id)->first();

                        if(isset($vendor_pay_status)) {
                            $vendor_pay_status->user_id = (int)$vendor_id;
                            $vendor_pay_status->status = 1;
                            $vendor_pay_status->save();
                        } else {
                            $new_pay_status = new VendorPayStatus();

                            $new_pay_status->user_id = (int)$vendor_id;
                            $new_pay_status->status = 1;
                            $new_pay_status->save();
                        }

                    }

                }

            //}

        } else {

            echo("Some thing went wrong in the payment!");
        }
    }

}
