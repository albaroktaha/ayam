<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDistributorModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'order_distributor_products';

    protected $primaryKey = 'id';

    protected $fillable = ['id','order_distributor_product_name_product', 'order_distributor_product_quantity', 'order_distributor_product_price', 'order_distributor_product_total', 'order_distributor_product_status', 'created_at', 'updated_at', 'id_users'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
