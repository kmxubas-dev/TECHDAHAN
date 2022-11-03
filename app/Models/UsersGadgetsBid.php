<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersGadgetsBid extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'gadget_id',
        'user_id',
        'amount',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'decimal:2',
    ];



    public function getAmountAttribute($value)
    {
        return $value*0.01;
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value*100;
    }



    /**
     * Relationship methods.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function gadget()
    {
        return $this->belongsTo(UsersGadget::class, 'gadget_id', 'id');
    }
}
