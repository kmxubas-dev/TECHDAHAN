<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersGadget extends Model
{
    use HasFactory;



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
}
