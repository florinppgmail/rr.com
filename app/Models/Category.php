<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'category_id', 'description', 'icon'];

    /**
     * Scope a query to only include member users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('category_id');
    }

    /**
     * Subcategories that belong to a root category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany('App\Models\Category');
    }

    /**
     * Root category of each subcategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id', 'id');
    }

    public function referrals()
    {
        return $this->hasMany('App\Models\Referral');
    }

    public function vendors()
    {
        return $this->belongsToMany('App\User', 'vendor_category')->withTimestamps();
    }
}
