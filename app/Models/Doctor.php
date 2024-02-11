<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['nombre', 'especialidad', 'telefono', 'correo'];

    protected $guarded = [];

    public function medicalAppointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }
    
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }
}
