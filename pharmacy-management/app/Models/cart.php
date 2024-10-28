<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function medication()
    {
        return $this->belongsTo(medication::class);
    }
    public function patient(){
        return $this->belongsTo(patient::class);
    }
}
