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
        Schema::table('medical_appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('specialty_id')->after('appointment_datetime'); // Agregar columna specialty_id
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade'); // Definir restricción de clave externa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_appointments', function (Blueprint $table) {
            $table->dropForeign(['specialty_id']); // Eliminar restricción de clave externa
            $table->dropColumn('specialty_id'); // Eliminar columna specialty_id
        });
    }
};
