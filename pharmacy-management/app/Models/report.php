<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_type',     // e.g., 'sales', 'inventory', 'patient'
        'patient_id',      // Nullable, used if it's a patient-specific report
        'start_date',      // For date-range reports
        'end_date',
        'generated_at',    // Timestamp when the report was generated
        'file_path',       // Path to the saved report file, if applicable
    ];

    // Define relationship to Patient (if applicable)
    public function patient()
    {
        return $this->belongsTo(patient::class);
    }
}
