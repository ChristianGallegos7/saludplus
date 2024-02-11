<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    protected $fillable = ['appointment_datetime','date_time', 'status', 'doctor_id'];
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
