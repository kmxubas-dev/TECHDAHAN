<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersGadget extends Model
{
    use HasFactory;



    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'details' => 'object',
    ];

    public function getPriceOriginalAttribute($value)
    {
        return $value*0.01;
    }
    public function setPriceOriginalAttribute($value)
    {
        $this->attributes['price_original'] = $value*100;
    }
    public function getPriceSellingAttribute($value)
    {
        return $value*0.01;
    }
    public function setPriceSellingAttribute($value)
    {
        $this->attributes['price_selling'] = $value*100;
    }



    /**
     * Relationship methods.
     */
    public function offers()
    {
        return $this->hasMany(UsersGadgetsOffer::class, 'gadget_id', 'id');
    }

    public function bids()
    {
        return $this->hasMany(UsersGadgetsBid::class, 'gadget_id', 'id');
    }
}
