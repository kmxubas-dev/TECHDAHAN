<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMessagesGroup extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'status',
        'gadget_id',
        'seller_id',
        'user_id',
    ];



    /**
     * Relationship methods.
     */
    public function gadget()
    {
        return $this->belongsTo(UsersGadget::class, 'gadget_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(UsersMessage::class, 'group_id', 'id');
    }
    public function messages_latest()
    {
        return $this->hasOne(UsersMessage::class, 'group_id', 'id')->latestOfMany();
    }
}
