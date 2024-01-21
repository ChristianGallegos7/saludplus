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
            $table->dateTime('date_time'); // Fecha y hora de la cita
            $table->enum('status', ['available', 'reserved', 'completed'])->default('available');
            $table->unsignedBigInteger('patient_id')->nullable(); // ID del paciente asociado
            $table->unsignedBigInteger('doctor_id')->nullable(); // ID del médico asociado
            $table->timestamps();

            // Claves foráneas
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
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

