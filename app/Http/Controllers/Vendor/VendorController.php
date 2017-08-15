<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Category;
use App\Models\States;

use App\Http\Requests\UpdateVendor;
use App\Http\Requests\UpdateVendorProfile;
use App\Http\Requests\UpdatePassword;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendor.index')->with([
            'categories' => (new Category())->root()->get(),
            'subscribedCategories' => Auth()->user()->categories()->get(),
            'states' => (new States())->all(),
            'referralsBought' => Auth::user()->referrals()->get(),
            'recommendedReferrals' => Auth::user()->recommendations()->free()->notExpired()->get(),
        ]);
    }

    public function password()
    {
        return view('vendor.settings.password')->with([
            'subscribedCategories' => Auth()->user()->categories()->get(),
            'referralsBought' => Auth::user()->referrals()->get(),
        ]);
    }

    public function profile()
    {
        return view('vendor.settings.profile')->with([
            'subscribedCategories' => Auth()->user()->categories()->get(),
            'referralsBought' => Auth::user()->referrals()->get(),
            'states' => (new States())->all(),
        ]);
    }

    public function updateProfile(UpdateVendorProfile $request)
    {
        Auth::user()->profile->fill($request->all())->save();

        return response()->json('Settings successfully changed.', 200);
    }

    public function updatePassword(UpdatePassword $request)
    {
        Auth::user()->fill(['password' => bcrypt($request->input('new_password'))])->save();

        return response()->json('Settings successfully changed.', 200);
    }

    public function update(UpdateVendor $request)
    {
        Auth::user()->fill($request->all())->save();

        return response()->json('Settings successfully changed.', 200);
    }
}
