<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorProductsModels extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $table = 'distributor_products';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'quantity', 'price', 'image', 'description', 'id_users'];
}
