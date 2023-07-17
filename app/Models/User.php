<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = false;

    protected $fillable = [
        'id',
        'username',
        'password',
        'roles',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function OrderStock()
    {
        return $this->hasMany(OrderStock::class, 'id_users');
    }

    public function OrderDistributor()
    {
        return $this->hasMany(OrderDistributorModels::class, 'id_users');
    }

    public function Customer()
    {
        return $this->hasMany(CustomerModels::class, 'id_users');
    }
}
