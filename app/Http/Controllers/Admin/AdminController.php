<?php

namespace App\Http\Controllers\Admin;

use App\Models\Referral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $referrals = new Referral();

        return view('admin.index')->with([
            'referralsFreeCount' => $referrals->free()->notExpired()->count(),
            'referralsSoldCount' => $referrals->sold()->count(),
            'referralsExpiredCount' => $referrals->expired()->count(),
        ]);
    }

    public function website()
    {
        return view('admin.settings.website');
    }
    public function profile()
    {
        return view('admin.settings.profile');
    }
}
