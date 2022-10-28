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
        'payment' => 'object',
    ];



    public function getPriceAttribute($value)
    {
        return $value*0.01;
    }
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value*100;
    }



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

    public function gadget()
    {
        return $this->belongsTo(UsersGadget::class, 'gadget_id', 'id');
    }

    public function offer()
    {
        return $this->hasOne(UsersGadgetsOffer::class, 'id', 'offer_id');
    }

    public function bid()
    {
        return $this->hasOne(UsersGadgetsBid::class, 'id', 'bid_id');
    }
}
