<?php

namespace App\Http\Controllers\Member;

use App\Events\MemberPaymentRequested;
use App\Http\Controllers\Controller;
use App\Models\MemberPayment;
use Auth;
use App\Http\Requests\StorePayment;
use App\Http\Requests\UpdatePayment;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('member.settings.payments')->with([
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
            'payments' => Auth::user()->payments()->get(),
            'balance' => Auth::user()->balance(),
        ]);
    }

    public function store(StorePayment $request)
    {
        if(Auth::user()->payments()->requested()->count())
            return response()->json(['You cannot ca$h out until the current request is not paid.'], 403);

        if($payment = MemberPayment::create(array_merge($request->all(), ['user_id' => Auth::user()->id]))){
            event(new MemberPaymentRequested($payment));

            return response()->json(['Payment requested successfully.'], 200);
        }

        return response()->json(['Payment could not be created.'], 400);
    }

    public function update(UpdatePayment $request)
    {

    }
}
