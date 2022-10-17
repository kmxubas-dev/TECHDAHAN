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
        'methods' => 'object',
        'installment' => 'object',
        // 'bidding_min' => 'decimal:2',
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

    public function getBiddingMinAttribute($value)
    {
        return $value*0.01;
    }
    public function setBiddingMinAttribute($value)
    {
        $this->attributes['bidding_min'] = $value*100;
    }



    /**
     * Relationship methods.
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(UsersGadgetsOffer::class, 'gadget_id', 'id');
    }

    public function bids()
    {
        return $this->hasMany(UsersGadgetsBid::class, 'gadget_id', 'id');
    }




    /**
     * Helper methods.
     */
    function getElapsedTime($datetime, $format = '') {
        // '%y years, %m months, %d days, %h hours and %i minutes ago'
        $now = new \DateTime;
        $ago = new \DateTime($datetime);

        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        if ($format == '') {
            if ($diff->y != 0) $format .= '%y years ago';
            elseif ($diff->m != 0) $format .= '%m months ago';
            elseif ($diff->d != 0) $format .= '%d days ago';
            elseif ($diff->i != 0) $format .= '%i minutes ago';
            else $format .= '%i minutes ago';
        }

        return $diff->format($format);
    }
}
