<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_mngt extends Model
{
    use HasFactory;
    protected $fillable = ['medication_id', 'quantity', 'total_price', 'sale_date'];

    // Relationship with Medication
    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
