<?php

namespace App;

use App\Models\MemberProfile;
use App\Models\VendorProfile;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Auth;

/**
 * Class User
 * @package App
 * @property Carbon created_at
 */
class User extends Authenticatable
{
    use Notifiable;

    const ROLE_MEMBER = 2, ROLE_VENDOR = 3;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The event map for the model
     *
     * @var array
     */

    // TODO : implement later
    /*protected $events = [
        'created' => UserCreated::class,
    ];*/

    /**
     * Scope a query to only include member users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMember($query)
    {
        return $query->where('role_id', self::ROLE_MEMBER);
    }

    /**
     * Scope a query to only include vendor users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVendor($query)
    {
        return $query->where('role_id', self::ROLE_VENDOR);
    }

    /**
     * The referrals :
     *  - added by a member;
     *  - bought by a member
     *
     * @return $this|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        if (Auth::user()->role_id == self::ROLE_MEMBER) {
            return $this->hasMany('App\Models\Referral');
        } elseif (Auth::user()->role_id == self::ROLE_VENDOR) {
            return $this->belongsToMany('App\Models\Referral', 'vendor_referral')->withTimestamps()->withPivot('created_at');
        }
    }

    /**
     * Payments requested & made to a member
     *
     * @return $this|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        if (Auth::user()->role_id == self::ROLE_MEMBER) {
            return $this->hasMany('App\Models\MemberPayment');
        }
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category',
            'vendor_category')->withTimestamps();
    }

    public function profile()
    {
        if ($this->role_id == self::ROLE_MEMBER) {
            return $this->hasOne(MemberProfile::class, 'user_id');
        }
        if ($this->role_id == self::ROLE_VENDOR) {
            return $this->hasOne(VendorProfile::class, 'user_id');
        }
    }

    /**
     * The referrals recommended to a vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recommendations()
    {
        return $this->belongsToMany('App\Models\Referral', 'vendor_recommended_referral')->withTimestamps();
    }

    /**
     * Returns the buyer of the referral entity
     * (you need to use ->first()->get())
     *
     * @return $this
     */
    public function watchedReferrals()
    {
        if (Auth::user()->role_id == self::ROLE_VENDOR)
            return $this->belongsToMany('App\Models\Referral', 'referral_details_requests')->withTimestamps()->withPivot('created_at');
    }

    public function balance()
    {
        if (Auth::user()->role_id == self::ROLE_MEMBER) {
            $balance = 0;

            foreach(Auth::user()->referrals()->sold()->get() as $referral){
                $balance = $balance + ($referral->sold_with -5);
            }

            $paid = Auth::user()->payments()->approved()->sum('requested_sum');
            $result = $balance - $paid;

            return $result >= 0 ? $result  : 0;
        }
    }
}
