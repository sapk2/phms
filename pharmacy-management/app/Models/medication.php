<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medication extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'total_value',
        'price',
        'medicine_types',
        'photopath'
    ];
}
