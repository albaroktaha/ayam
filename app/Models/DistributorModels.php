<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'distributor';

    protected $primaryKey = 'id';

    protected $fillable = ['id','distributor_name', 'distributor_phone', 'distributor_address', 'id_user'];

    public function DistributorProductsModels()
    {
        return $this->hasMany(DistributorProductsModels::class, 'id_distributor');
    }

    public function ProductAdminModels()
    {
        return $this->hasMany(ProductAdminModels::class, 'id_distributor');
    }
}
