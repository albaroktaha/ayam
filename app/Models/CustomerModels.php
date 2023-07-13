<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = ['id','customer_name','customer_gender','customer_email','customer_image','customer_phone', 'customer_address', 'id_users'];
}
