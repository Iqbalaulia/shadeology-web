<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'tipe_products';
    protected $primaryKey = 'id_type_product';
    protected $fillable = ['name'];
}
