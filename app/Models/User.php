<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail

{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'object',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];



    /* ================================================================================ */

    public function ratings()
    {
        return $this->hasMany(UsersGadgetsRating::class, 'seller_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(UsersTransaction::class, 'seller_id', 'id');
    }



    /**
     * Helper methods.
     */
    function getElapsedTime($datetime, $format = '')
    {
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
