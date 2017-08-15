<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\States;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

use App\Models\Category;
use App\Http\Requests\SendContactUsEmail;
use App\Mail\SendContactUs;

class WebsiteController extends Controller
{
    /**
     * Shows the homepage.
     *
     */
    public function index()
    {
        return view('website/homepage')->with([
            'categories' => (new Category())->root()->get(),
        ]);
    }

    /**
     * @param Request $request
     * @param string $category
     * @param string $subcategory
     * @param string $city
     *
     * @return View
     */
    public function search(Request $request, $category = '', $subcategory = '', $city = '')
    {
        //var_dump($request->all());exit;
        return view('website.search')->with([
            'categories' => (new Category())->root()->get(),
            'states' => (new States())->all(),
            'results' => (new Referral)->search($category, $subcategory, $city, $request->all()),
        ]);
    }

    /**
     * Shows the contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('website/contact');
    }

    /**
     * Shows the contact page.
     *
     * @param $request
     *
     * @return \Illuminate\Http\Response
     */
    public function contactAdmin(SendContactUsEmail $request)
    {
        if(Cache::get('settings_contact_address')){
            Mail::to(Cache::get('settings_contact_address'))->send(new SendContactUs($request->all()));

            return response()->json('Email sent successfully.', 200);
        }
        return response()->json('Email was not sent.', 400);
    }

    /**
     * Shows the contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('website/about');
    }
}
