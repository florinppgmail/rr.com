<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/************************ PUBLIC WEBSITE ROUTES **************************/
/*************************************************************************/

Route::get('/', 'WebsiteController@index')->name('homepage');
Route::get('/about', 'WebsiteController@about')->name('aboutpage');
Route::get('/contact', 'WebsiteController@contact')->name('contactpage');

Route::post('/contact', 'WebsiteController@contactadmin');

/***************** AUTH ROUTES - ORIGINAL AND UPDATED ********************/
/*************************************************************************/

Auth::routes();
// Overriding AUTH routes as necessary
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('vendor/register', 'Auth\RegisterController@showRegistrationForm')->name('vendor-register');

/****************************** ADMIN ROUTES *****************************/
/*************************************************************************/
Route::group([
        'prefix' => 'admin',
        'middleware' => ['auth', 'admin']
    ],
    function(){
        Route::get('/', 'Admin\AdminController@index')->name('admin-dashboard');
        Route::get('/users/members', 'Admin\UserController@members')->name('admin-users-members');
        Route::post('/users/members/all', 'Admin\UserController@fetchMembers')->name('admin-users-members-all');
        Route::get('/users/vendors', 'Admin\UserController@vendors')->name('admin-users-vendors');
        Route::post('/users/vendors/all', 'Admin\UserController@fetchVendors')->name('admin-users-vendors-all');
        Route::post('/users/{id}/status', 'Admin\UserController@status')->name('admin-users-status');

        Route::get('/categories', 'Admin\CategoryController@index')->name('admin-categories');
        Route::post('/categories/all', 'Admin\CategoryController@all')->name('admin-categories-all');
        Route::post('/categories', 'Admin\CategoryController@store')->name('admin-categories-store');
        Route::post('/categories/{id}', 'Admin\CategoryController@update')->name('admin-categories-update');

        Route::get('/referrals', 'Admin\ReferralController@index')->name('admin-referrals');
        Route::get('/referrals/free', 'Admin\ReferralController@free')->name('admin-referrals-free');
        Route::post('/referrals/free/all', 'Admin\ReferralController@allFree')->name('admin-referrals-free-all');
        Route::get('/referrals/sold', 'Admin\ReferralController@sold')->name('admin-referrals-sold');
        Route::post('/referrals/sold/all', 'Admin\ReferralController@allSold')->name('admin-referrals-sold-all');

        Route::get('/payments/requested', 'Admin\PaymentController@requested')->name('admin-payments-requested');
        Route::post('/payments/requested/all', 'Admin\PaymentController@allRequested')->name('admin-payments-requested-all');
        Route::get('/payments/approved', 'Admin\PaymentController@approved')->name('admin-payments-approved');
        Route::post('/payments/approved/all', 'Admin\PaymentController@allApproved')->name('admin-payments-approved-all');
        Route::get('/payments/errors', 'Admin\PaymentController@errors')->name('admin-payments-errors');
        Route::post('/payments/errors/all', 'Admin\PaymentController@allErrors')->name('admin-payments-errors-all');
        Route::post('/payments/{id}/accept', 'Admin\PaymentController@accept')->name('admin-payments-accept');

        Route::get('/settings/website', 'Admin\AdminController@website')->name('admin-settings-website');
        Route::post('/settings/website', 'Admin\SettingsController@update')->name('admin-settings-update');
        Route::get('/settings/profile', 'Admin\AdminController@profile')->name('admin-settings-profile');
    }
);

/***************************** MEMBER ROUTES *****************************/
/*************************************************************************/
Route::group([
        'prefix' => 'member',
        'middleware' => ['auth', 'member']
    ],
    function(){
        Route::get('/', 'Member\MemberController@index')->name('member-dashboard');
        Route::post('/', 'Member\MemberController@update')->name('member-update-member');
        Route::post('/update/password', 'Member\MemberController@updatePassword')->name('member-update-password');

        Route::get('/referrals', 'Member\ReferralController@index')->name('member-referrals');
        Route::post('/referrals', 'Member\ReferralController@store')->name('member-referrals-create');
        Route::post('/referrals/all', 'Member\ReferralController@free')->name('member-referrals-all');
        Route::get('/referrals/free', 'Member\ReferralController@free')->name('member-referrals-free');
        Route::post('/referrals/free/all', 'Member\ReferralController@allFree')->name('member-referrals-free-all');
        Route::get('/referrals/sold', 'Member\ReferralController@sold')->name('member-referrals-sold');
        Route::post('/referrals/sold/all', 'Member\ReferralController@allSold')->name('member-referrals-sold-all');
        Route::get('/referrals/expired', 'Member\ReferralController@expired')->name('member-referrals-expired');
        Route::post('/referrals/expired/all', 'Member\ReferralController@allExpired')->name('member-referrals-expired-all');

        Route::get('/settings/profile', 'Member\MemberController@profile')->name('member-settings-profile');
        Route::post('/settings/profile', 'Member\MemberController@updateProfile')->name('member-settings-profile-update');
        Route::get('/settings/password', 'Member\MemberController@password')->name('member-settings-password');
        Route::post('/settings/password', 'Member\MemberController@updatePassword')->name('member-settings-password-update');

        Route::get('/payments', 'Member\PaymentsController@index')->name('member-payments');
        Route::post('/payments', 'Member\PaymentsController@store')->name('member-payments');

    }
);

/***************************** VENDOR ROUTES *****************************/
/*************************************************************************/
Route::group([
        'prefix' => 'vendor',
        'middleware' => ['auth', 'vendor']
    ],
    function(){
        Route::get('/', 'Vendor\VendorController@index')->name('vendor-dashboard');
        Route::post('/', 'Vendor\VendorController@update')->name('vendor-update-vendor');

        Route::get('/referrals/bought', 'Vendor\ReferralController@bought')->name('vendor-referrals-bought');
        Route::post('/referrals/bought', 'Vendor\ReferralController@allBought')->name('vendor-referrals-bought');
        Route::post('/referrals/{id}/details', 'Vendor\ReferralController@requestDetails')->name('vendor-referrals-view');
        Route::get('/referrals/{id}', 'Vendor\ReferralController@view');
        Route::post('/referrals/{id}/buy', 'Vendor\ReferralController@buy');
        Route::post('/referrals/{id}/reject', 'Vendor\ReferralController@reject');
        Route::post('/referrals/{id}/pending', 'Vendor\ReferralController@pending');

        Route::get('/categories', 'Vendor\CategoryController@index')->name('vendor-categories');
        Route::get('/categories/all', 'Vendor\CategoryController@all')->name('vendor-categories-all');
        Route::post('/categories/manage', 'Vendor\CategoryController@add')->name('vendor-categories-add');
        Route::delete('/categories/manage', 'Vendor\CategoryController@remove')->name('vendor-categories-remove');

        Route::get('/settings/profile', 'Vendor\VendorController@profile')->name('vendor-settings-profile');
        Route::post('/settings/profile', 'Vendor\VendorController@updateProfile')->name('vendor-settings-profile-update');
        Route::get('/settings/password', 'Vendor\VendorController@password')->name('vendor-settings-password');
        Route::post('/settings/password', 'Vendor\VendorController@updatePassword')->name('vendor-settings-password-update');
    }
);

Route::get('/{category}/{subcategory}/{city?}', 'WebsiteController@search');
Route::post('/{category}/{subcategory}/{city?}', 'WebsiteController@search');