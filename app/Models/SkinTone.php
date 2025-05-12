<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkinTone extends Model
{
    use HasFactory;

    protected $table = 'skintones';
    protected $primaryKey = 'id_skintone';
    protected $fillable = ['name'];
}
