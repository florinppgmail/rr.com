<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\UpdatePassword;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\States;
use App\Models\Category;
use App\Http\Requests\UpdateMemberProfile;
use App\Http\Requests\UpdateMember;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index')->with([
            'categories' => (new Category())->root()->get(),
            'states' => (new States())->all(),
            'totalReferrals' => Auth::user()->referrals()->count(),
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
            'totalExpiredReferrals' => Auth::user()->referrals()->expired()->count(),
            'referralsSold' => Auth::user()->referrals()->sold()->limit(10)->get(),
            'isLocationSet' => (Auth::user()->profile->gps_lat == 0 && Auth::user()->profile->gps_lng == 0) ? false : true,
        ]);
    }

    public function profile()
    {
        return view('member.settings.profile')->with([
            'states' => (new States())->all(),
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
        ]);
    }

    public function password()
    {
        return view('member.settings.password')->with([
            'totalFreeReferrals' => Auth::user()->referrals()->free()->notExpired()->count(),
            'totalSoldReferrals' => Auth::user()->referrals()->sold()->count(),
        ]);
    }

    public function updateProfile(UpdateMemberProfile $request)
    {
        Auth::user()->profile->fill($request->all())->save();

        return response()->json('Settings successfully changed.', 200);
    }

    public function updatePassword(UpdatePassword $request)
    {
        Auth::user()->fill(['password' => bcrypt($request->input('new_password'))])->save();

        return response()->json(['Password updated successfully.'], 200);
    }

    public function update(UpdateMember $request)
    {
        Auth::user()->fill($request->all())->save();

        return response()->json('Settings successfully changed.', 200);
    }
}
