<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTransaction extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'info',
        'price',
        'method',
        'payment',
        'payment_amount',
        'bid_id',
        'offer_id',
        'gadget_id',
        'seller_id',
        'buyer_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'info' => 'object',
    ];



    /**
     * Relationship methods.
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }
}
