<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'product_id',
            'user_id',
            'rating',
            'comment'
        ];

    public function product() :BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }

    public function user() :BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
