<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_type');  // e.g., 'sales', 'inventory', 'patient'
            $table->unsignedBigInteger('patient_id')->nullable();  // For patient-specific reports
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->date('start_date')->nullable();  // Report start date (for date range)
            $table->date('end_date')->nullable();    // Report end date
            $table->timestamp('generated_at')->nullable();  // Timestamp when the report was generated
            $table->string('file_path')->nullable();  // Path to the saved report file
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
