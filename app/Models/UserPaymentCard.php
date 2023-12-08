<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPaymentCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_card_type_id',
        'name',
        'number',
        'last_four_number',
        'exp_date',
        'holder_name',
    ];

    public function paymentCardType() :BelongsTo
    {
        return $this->belongsTo(PaymentCardType::class,'payment_card_type_id', 'id');
    }
}

