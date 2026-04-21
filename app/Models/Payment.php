<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   use HasFactory;

    protected $fillable = [
        'payment_id',
        'payment_link_id',
        'checkout_url',
        'status',
        'amount',
        'currency',
        'purpose',
    ];

    protected $casts = [
        'amount' => 'integer',
        'status' => 'string',
        'currency' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function getAmountInDollarsAttribute()
    {
        return $this->amount / 100;
    }
}