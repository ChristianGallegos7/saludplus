<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    
    public function medicalAppointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }
}
