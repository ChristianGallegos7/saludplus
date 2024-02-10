<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    protected $fillable = ['date_time', 'status', 'doctor_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
