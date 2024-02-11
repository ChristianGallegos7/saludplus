<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define los datos que deseas insertar en la tabla specialties
        $specialties = [
            ['name' => 'Cardiología'],
            ['name' => 'Dermatología'],
            ['name' => 'Pediatría'],
            // Agrega más especialidades si es necesario
        ];

        // Inserta los datos en la tabla specialties
        DB::table('specialties')->insert($specialties);
    }
}
