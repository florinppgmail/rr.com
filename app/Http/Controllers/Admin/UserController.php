<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function members()
    {
        return view('admin.users.members');
    }

    public function vendors()
    {
        return view('admin.users.vendors');
    }

    public function fetchVendors()
    {
        $users = User::vendor()->get()->map(function (User $item) {
            $item->categories = 1;
            $item->referrals = 1;
            $item->active = $item->active ? 'YES' : 'NO';
            $item->sign_up = $item->created_at->format("F j, Y");

            return $item;
        });
        $users->load('profile');

        return response()->json($users);
    }

    public function fetchMembers()
    {
        $users = User::member()->get()->map(function (User $item) {
            $item->categories = 1;
            $item->referrals = 1;
            $item->active = $item->active ? 'YES' : 'NO';
            $item->sign_up = $item->created_at->format("F j, Y");

            return $item;
        });
        $users->load('profile');

        return response()->json($users);
    }

    public function status($id)
    {
        if ($user = User::find($id)) {
            $user->active = $user->active ? 0 : 1;
            $user->save();

            return response()->json('Status changed successful.');
        }

        return response()->json('Status not changed.', 403);
    }
}
