<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'description', 
        'address', 
        'email', 
        'phone', 
        'facebook_url', 
        'twitter_url', 
        'instagram_url', 
        'linkedin_url', 
        'copyright_text',
    ];
}
