<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    use HasFactory;
    protected $fillable=[
        'patient_id',
        'user_id',
        'doctor_name'
        
    ];
     // Define relationship with Patient
     public function patient()
     {
         return $this->belongsTo(Patient::class);
     }
 
     // Define relationship with User (Pharmacist)
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
