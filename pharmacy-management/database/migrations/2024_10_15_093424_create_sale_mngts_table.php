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
        Schema::create('sale_mngts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medication_id');  // Foreign key to medications
            $table->integer('quantity');  // Quantity of medication sold
            $table->decimal('total_price', 10, 2);  // Total price of the sale
            $table->date('sale_date');  // Date of the sale
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_mngts');
    }
};
