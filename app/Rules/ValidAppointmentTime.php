<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;


class ValidAppointmentTime implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Convertir la fecha y hora a un objeto Carbon en la zona horaria local
        $appointmentDateTime = Carbon::parse($value, config('app.timezone'));
    
        // Validar si la hora está dentro del rango permitido (8:00 - 17:00)
        return $appointmentDateTime->hour >= 8 && $appointmentDateTime->hour < 17;
    }
    
    

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cita médica solo puede ser programada entre las 8:00 y las 17:00 horas.';
    }
}
