<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductList extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'name',
        'id_type',
        'id_merk',
        'image',
        'link_affiliate',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(ProductBrand::class, 'id_merk', 'id_merk');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'id_type', 'id_type_product');
    }
}
