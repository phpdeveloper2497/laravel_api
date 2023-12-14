<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class   User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function favorites() :BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function hasFavorite($favorite_id)
    {
        return $this->favorites()->where('product_id',$favorite_id)->exists();
    }
    public function addresses() :HasMany
    {
        return $this->HasMany(UserAddress::class);
    }

    public function orders() :HasMany
    {
        return $this->HasMany(Order::class);
    }

    public function reviews() :HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function settings() :HasMany
    {
        return $this->hasMany(UserSetting::class,'user_id', 'id');
    }

    public function paymentCards() :HasMany
    {
        return $this->hasMany(UserPaymentCard::class);
    }
}
