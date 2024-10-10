<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable=[
        'medication_id',
        'quantity'
    ];
    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
