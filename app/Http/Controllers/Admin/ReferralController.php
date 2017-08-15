<?php

namespace App\Http\Controllers\Admin;

use App\Models\Referral;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferral;


class ReferralController extends Controller
{
    public function index(){
        return view('admin.categories.index');
    }

    public function free(){
        return view('admin.referrals.free');
    }
    public function sold(){
        return view('admin.referrals.sold');
    }

    public function all(){
        $categories = (new Referral())->orderBy('created_at', 'desc')->get()->map(function ($item){
            //$item->subcategories = $item->subcategories()->count();
            //$item->created_at = date("F j, Y", strtotime($item->created_at));
            //$item->root_category = count($rootCategory) ? $rootCategory[0] : null;

            return $item;
        });

        return response()->json($categories, 200);
    }

    public function allFree(){
        $referrals = (new Referral())->free()->orderBy('created_at', 'desc')->get()->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->neededAt = date("F j, Y", strtotime($item->needed_at));
            $item->belongs_to = $item->member->name;

            return $item;
        });

        $referrals->load('category');
        $referrals->load('viewers');

        return response()->json($referrals, 200);
    }

    public function allSold(){
        $referrals = (new Referral())->sold()->orderBy('created_at', 'desc')->get()->map(function ($item){
            $item->createdAt = date("F j, Y", strtotime($item->created_at));
            $item->neededAt = date("F j, Y", strtotime($item->needed_at));
            $item->belongs_to = $item->member->name;

            return $item;
        });

        $referrals->load('category');
        $referrals->load('buyers');

        return response()->json($referrals, 200);
    }

    public function store(StoreReferral $request){
        Referral::create($request->all());

        return redirect(route('company-referral'));
    }

    public function update(StoreReferral $request, $id){
        if($cat = Referral::find($id)){
            $cat->fill($request->all());
            $cat->save();
        }

        return redirect(route('company-referral'));
    }
}
