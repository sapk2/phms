<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site_setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tagline',
        'description',
        'keywords',
        'logo',
        'favicon',
        'admin_email',
    ];
}
