<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersGadgetsRating extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'rate',
        'feedback',
        'gadget_id',
        'seller_id',
        'user_id',
    ];



    /**
     * Relationship methods.
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function gadget()
    {
        return $this->belongsTo(UsersGadget::class, 'gadget_id', 'id');
    }
}
