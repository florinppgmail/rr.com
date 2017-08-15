<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferral;

use Auth;
use App\Models\Referral;
use App\Events\ReferralAdded;

class ReferralController extends Controller
{
    public function index(){
        return view('member.referrals.index')->with([
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
            'totalExpiredReferrals' => Auth::user()->referrals()->free()->expired()->count(),
        ]);
    }

    public function free(){
        return view('member.referrals.free')->with([
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
            'referrals' => Auth::user()->referrals()->free()->notExpired()->get(),
        ]);
    }

    public function sold(){
        return view('member.referrals.sold')->with([
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
            'referrals' => Auth::user()->referrals()->sold()->get(),
        ]);
    }

    public function expired(){
        return view('member.referrals.expired')->with([
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
            'referrals' => Auth::user()->referrals()->free()->expired()->get(),
        ]);
    }

    public function all(){
        $referrals = Auth::user()->referrals()->orderBy('created_at', 'desc')->get();

        $response = $referrals->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->neededAt = date("F j, Y", strtotime($item->needed_at));

            return $item;
        });

        return response()->json($response, 200);
    }

    public function allFree(){
        $referrals = Auth::user()->referrals()->free()->orderBy('created_at', 'desc')->get();

        $response = $referrals->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->neededAt = date("F j, Y", strtotime($item->needed_at));

            return $item;
        });

        return response()->json($response, 200);
    }

    public function allSold(){
        $referrals = Auth::user()->referrals()->sold()->orderBy('created_at', 'desc')->get();

        $response = $referrals->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->neededAt = date("F j, Y", strtotime($item->needed_at));
            $item->soldAt = date("F j, Y", strtotime($item->sold_at));

            return $item;
        });

        return response()->json($response, 200);
    }

    public function allExpired(){
        $referrals = Auth::user()->referrals()->expired()->orderBy('created_at', 'desc')->get();

        $response = $referrals->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->neededAt = date("F j, Y", strtotime($item->needed_at));
            $item->expiredAt = date("F j, Y", strtotime($item->needed_at));

            return $item;
        });

        return response()->json($response, 200);
    }

    public function store(StoreReferral $request){
        if($referral = Referral::create(array_merge($request->all(), ['user_id' => Auth::user()->id]))){
            event(new ReferralAdded($referral));

            return response()->json(['Referral successfully added.'], 200);
        }

        return response()->json(['Referral was not created.'], 400);
    }

    public function update(StoreReferral $request, $id){
        if($cat = Referral::find($request->input('id'))){
            $cat->fill($request->all());
            $cat->save();
        }

        return response()->json(['Referral successfully updated.'], 200);
    }
}
