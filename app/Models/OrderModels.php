<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModels extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = ['name_customer', 'name_product', 'quantity', 'price', 'total', 'created_at', 'updated_at', 'id_customer'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
