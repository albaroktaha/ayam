<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStock extends Model
{
    use HasFactory;

    protected $table = 'order_distributor_products';

    protected $primaryKey = 'id';

    protected $fillable = ['order_distributor_product_name_product', 'order_distributor_product_quantity', 'order_distributor_product_price', 'order_distributor_product_total', 'order_distributor_product_status', 'created_at', 'updated_at', 'id_users'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
