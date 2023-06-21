<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorProductsModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'distributor_products';

    protected $primaryKey = 'id';

    protected $fillable = ['id','distributor_product_name', 'distributor_product_quantity', 'distributor_product_price', 'distributor_product_image', 'distributor_product_description', 'id_distributor'];

    public function DistributorModels()
    {
        return $this->belongsTo(DistributorModels::class, 'id');
    }
}
