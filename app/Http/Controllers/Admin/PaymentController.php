<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberPayment;
use App\Models\MemberPaymentError;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function requested()
    {
        return view('admin.payments.requested');
    }

    public function approved()
    {
        return view('admin.payments.approved');
    }

    public function errors()
    {
        return view('admin.payments.errors');
    }

    public function allRequested()
    {
        $payments = (new MemberPayment)->requested()->get()->load('member');

        return response()->json($payments);
    }

    public function allApproved()
    {
        $payments = (new MemberPayment)->approved()->get()->load('member');

        return response()->json($payments);
    }

    public function allErrors()
    {

    }

    public function accept(Request $request, $id)
    {
        $payment = MemberPayment::where(['id'=>(int)$id, 'paid_at' => null])->first();

        if(!$payment) {
            Log::info('Unsuccessful Paypal Payment');
            return response()->json('Payment was not found or it was already accepted.');
        }



        // we make the transaction through paypal and if it's
        // successful we mark the payment request as paid
        if($payment && $this->sendMoney($payment)){
            Log::info('Successful Paypal Payment');
            $payment->paid_at = Carbon::now();
            $payment->save();

            return response()->json('Payment sent to member.');
        }

        Log::info('Payment was not sent to member. Please check the errors logged.');
        return response()->json('Payment was not sent to member. Please check the errors logged.');
    }

    protected function sendMoney($payment)
    {
        // TODO : implement method
        return true;
    }
}
