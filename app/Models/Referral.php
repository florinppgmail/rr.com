<?php

namespace App\Models;

use App\Events\ReferralRemovedFromPending;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\User;
use App\Models\Category;

class Referral extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'category_id', 'email', 'description', 'code', 'needed_at', 'contact_time',
        'phone', 'address', 'city', 'state', 'gps_lat', 'gps_lng', 'urgent', 'removable', 'sold_at',
    ];

    /**
     * Scope a query to only include member referrals.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSold($query)
    {
        return $query->where('sold', 1);
    }

    /**
     * Scope a query to only include member referrals.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFree($query)
    {
        return $query->where('sold', 0);
    }

    /**
     * Scope a query to only include referrals not expired.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotExpired($query)
    {
        return $query->where('needed_at', '>', Carbon::now()->format('Y-m-d ') . '00:00:00');
    }

    /**
     * Scope a query to only include expired referrals.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query)
    {
        return $query->where('needed_at', '<=', Carbon::now()->format('Y-m-d ') . '00:00:00');
    }

    /**
     * Scope a query to only include referrals in pending mode.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('pending', 1);
    }

    /**
     * Scope a query to exclude referrals in pending mode.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotPending($query)
    {
        return $query->where('pending', 0);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    /**
     * Returns the buyer of the referral entity
     * (you need to use ->first()->get())
     *
     * @return $this
     */
    public function buyers()
    {
        return $this->belongsToMany('App\User', 'vendor_referral')->withTimestamps()->withPivot('created_at');
    }

    /**
     * Returns the buyer of the referral entity
     * (you need to use ->first()->get())
     *
     * @return $this
     */
    public function viewers()
    {
        return $this->belongsToMany('App\User', 'referral_details_requests')->withTimestamps()->withPivot('created_at');
    }

    public function member()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }

    public function search($categoryName = false, $subcategoryName = false, $city = false, $post = null)
    {
        $search = (new Referral())->free()->notExpired();

        if(strlen($subcategoryName) && $subcategoryName !== 'all')
            $category = Category::where('name', implode(' ', explode('-', $subcategoryName)))->first();

        if(isset($category) && isset($category->id))
            $search->where('category_id', $category->id);

        if(isset($post['query']))
            $search->where('name', 'like', '%' .substr($post['query'],0,127) . '%');

        if(isset($post['urgent'])){
            $search->where('urgent', $post['urgent']);
        }

        if(isset($post['contact_time']))
            $search->where('contact_time', $post['contact_time']);

        return $search->get();
    }

    public static function cleanPendingReferrals()
    {
        $pendingReferrals = Referral::where('pending', 1)->free()->get();

        foreach ($pendingReferrals as $referral){
            if(Carbon::now() > $referral->updated_at->addHours(24)){
                event(new ReferralRemovedFromPending($referral, $referral->buyers()->get()->first(), $referral->member));
            }
        }
    }
}