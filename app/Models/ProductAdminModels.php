<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdminModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['id','product_name', 'product_quantity', 'product_price', 'product_image', 'product_description', 'id_distributor'];

    public function DistributorModels()
    {
        return $this->belongsTo(DistributorModels::class, 'id');
    }
}
