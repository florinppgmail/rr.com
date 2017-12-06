<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Requests\ManageVendorCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferral;
use Auth;
use App\Models\Referral;

class CategoryController extends Controller
{
    public function index()
    {
        return view('vendor.categories.index')->with([
            'categories' => Category::all(),
            'vendorCategories' => Auth::user()->categories()->get(),
            'subscribedCategoriesCount' => Auth()->user()->categories()->count(),
            'referralsBoughtCount' => Auth::user()->referrals()->count(),
            'isLocationSet' => (Auth::user()->profile->gps_lat > 0 && Auth::user()->profile->gps_lng > 0) ? true : false,
        ]);
    }

    public function all(){
        $referrals = Auth::user()->categories()->orderBy('created_at', 'desc')->get();

        $response = $referrals->map(function ($item){
            /*$item->created_at = date("F j, Y", strtotime($item->created_at));
            $item->bought_at = date("F j, Y", strtotime($item->bought_at));*/

            return $item;
        });

        return response()->json($response, 200);
    }

    public function add(ManageVendorCategory $request)
    {
        $categoryId = $request->input('id');

        if(!Auth::user()->categories->contains($categoryId)){
            Auth::user()->categories()->attach($categoryId);
            return response()->json(Category::find($categoryId));
        }

        return response()->json('Category was already assigned.', 400);
    }

    public function remove(ManageVendorCategory $request)
    {
        $categoryId = $request->input('id');

        if(Auth::user()->categories->contains($categoryId)){
            Auth::user()->categories()->detach($categoryId);
            return response()->json('Category removed successfully.', 200);

        }

        return response()->json('Category was not assigned.', 400);
    }
}
