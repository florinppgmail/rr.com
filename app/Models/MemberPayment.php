<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPayment extends Model
{
    protected $fillable = ['user_id', 'requested_sum'];
    /**
     * Scope a query to only include payments PAID.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved($query)
    {
        return $query->where('paid_at', '!=', null);
    }

    /**
     * Scope a query to only include payments Requested.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRequested($query)
    {
        return $query->where('paid_at', null);
    }

    public function errors()
    {
        return $this->hasMany('App\Models\MemberPaymentError');
    }

    public function member()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
