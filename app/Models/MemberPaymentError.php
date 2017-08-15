<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPaymentError extends Model
{
    protected $fillable = ['details', 'paypal_response'];
}
