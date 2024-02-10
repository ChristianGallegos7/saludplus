<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['nombre', 'especialidad', 'telefono', 'correo'];

    public function medicalAppointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }
}
