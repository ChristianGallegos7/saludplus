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
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('appointment_datetime'); // Fecha y hora de la cita médica
            $table->enum('status', ['available', 'reserved', 'completed'])->default('available'); // Estado de la cita médica
            $table->unsignedBigInteger('doctor_id'); // ID del doctor asociado (clave externa)
            $table->text('additional_info')->nullable(); // Información adicional sobre la cita médica (opcional)
            $table->timestamps();
            
            // Definir restricciones de clave externa
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_appointments');
    }
};
