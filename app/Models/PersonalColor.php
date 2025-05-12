<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalColor extends Model
{
    use HasFactory;

    protected $table = 'personal_colors';
    protected $primaryKey = 'id_personal_color';
    protected $fillable = ['name'];
}
