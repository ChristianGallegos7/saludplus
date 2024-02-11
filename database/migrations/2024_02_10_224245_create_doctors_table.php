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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del doctor
            $table->unsignedBigInteger('specialty_id'); // ID de la especialidad del doctor
            $table->string('telefono'); // Número de teléfono del doctor
            $table->string('correo')->unique(); // Correo electrónico del doctor (único)
            $table->timestamps();
    
            // Definir restricción de clave externa
            // $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
