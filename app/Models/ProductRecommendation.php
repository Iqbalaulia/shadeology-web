<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRecommendation extends Model
{
    use HasFactory;

    protected $table = 'product_recommendations';
    protected $primaryKey = 'id_recommendation';
    protected $fillable = [
        'id_recommendation',
        'id_skintone',
        'id_personal_color',
        'id_product',
    ];

    public function personalColor()
    {
        return $this->belongsTo(PersonalColor::class, 'id_personal_color', 'id_personal_color');
    }

    public function skintone()
    {
        return $this->belongsTo(SkinTone::class, 'id_skintone', 'id_skintone');
    }

    public function product()
    {
        return $this->belongsTo(ProductList::class, 'id_product', 'id_product');
    }
}
