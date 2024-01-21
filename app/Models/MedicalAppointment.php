<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'doctor_id',
        'patient_id',
        'status',
    ];
}
