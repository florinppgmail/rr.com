<?php

namespace App\Http\Controllers\Vendor;

use App\Events\ReferralPending;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Models\Referral;
use App\Events\ReferralBought;

class ReferralController extends Controller
{
    public function view(Request $request, $id){
        $referral = Auth::user()->recommendations()->free()->notExpired()->whereId($id)->first();

        if(!$referral || !$referral->viewers()->count())
            return redirect(route('member-dashboard'));

        return view('vendor.referrals.details')->with([
            'referral' => $referral,
            'subscribedCategories' => Auth()->user()->categories()->get(),
            'referralsBought' => Auth::user()->referrals()->get(),
            ]);
    }
    public function bought(){
        return view('vendor.referrals.bought')->with([
            'categories' => (new Category())->root()->get(),
            'subscribedCategories' => Auth()->user()->categories()->get(),
            'referralsBought' => Auth::user()->referrals()->get(),
            'referrals' => Auth::user()->referrals()->get(),
        ]);
    }

    public function allBought(){
        $referrals = Auth::user()->referrals()->orderBy('created_at', 'desc')->get();

        $response = $referrals->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->boughtAt = date("F j, Y", strtotime($item->bought_at));

            return $item;
        });

        return response()->json($response, 200);
    }

    public function buy(Request $request, $id){
        $referral = Auth::user()->recommendations()->free()->notExpired()->where(['id'=>(int)$id])->first();

        if($referral){
            Auth::user()->referrals()->attach($referral->id);
            event(new ReferralBought($referral, Auth::user(), $referral->member, [$request->input('transaction')['paymentID']]));

            return response()->json('Referral bought.', 200);
        }

        return response()->json('Could not buy referral.', 400);

    }

    public function pending(Request $request, $id){
        $referral = Auth::user()->recommendations()->where(['id'=>(int)$id])->first();

        if($referral){
            event(new ReferralPending($referral, Auth::user(), $referral->member));

            return response()->json('Referral marked as pending.', 200);
        }

        return response()->json('Referral could not be marked as pending.', 400);

    }

    public function reject(Request $request, $id){
        $referral = Auth::user()->recommendations()->where(['id'=>(int)$id])->first();

        if($referral){
            Auth::user()->recommendations()->detach($referral->id);

            return response()->json('Referral rejected.', 200);
        }

        return response()->json('Could not reject referral.', 400);
    }


    public function requestDetails(Request $request, $id){
        $referral = Auth::user()->recommendations()->where(['id'=>(int)$id])->first();

        if($referral){
            Auth::user()->watchedReferrals()->attach($referral->id);

            return response()->json('Referral marked as requested for details.', 200);
        }

        return response()->json('Could not mark referral as requested for details.', 400);

    }
}
