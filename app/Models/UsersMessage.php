<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMessage extends Model
{
    use HasFactory;



    /**
     * Relationship methods.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(UsersMessagesGroup::class, 'group_id', 'id');
    }
}
