<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use Faker\Factory as Faker;
use App\Models\Specialty;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Usamos Faker para generar datos ficticios
        $faker = Faker::create();

        // Obtener todos los IDs de las especialidades disponibles
        $especialidadesIds = Specialty::pluck('id')->toArray();

        // Creamos 10 doctores ficticios
        for ($i = 0; $i < 10; $i++) {
            Doctor::create([
                'nombre' => $faker->name,
                'specialty_id' => $faker->randomElement($especialidadesIds),
                'telefono' => $faker->phoneNumber,
                'correo' => $faker->email,
            ]);
        }
    }
}
