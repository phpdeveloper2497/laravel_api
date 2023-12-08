<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentCardType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'icon',
    ];

//    public function cards() :HasMany
//    {
//        return $this->hasMany(UserPaymentCard::class);
//    }
}
