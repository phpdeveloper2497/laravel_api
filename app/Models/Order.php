<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'comment',
        'sum',
        'status_id',
        'price ',
        'delivery_method_id',
        'payment_type_id',
        'product_list',
        'address'
    ];


    protected $casts = [
        'product_list' => 'array',
        'address' => 'array'
    ];
    public function user() :BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function deliveryMethod() :BelongsTo
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id', 'id');
    }

    public function paymentType() :BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function status() :BelongsTo
    {
        return $this->BelongsTo(Status::class);
    }


}
