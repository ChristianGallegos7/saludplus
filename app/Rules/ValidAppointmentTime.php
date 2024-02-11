<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

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
        $appointmentDateTime = strtotime($value);
        $startOfDay = strtotime('08:00');
        $endOfDay = strtotime('17:00');
        return $appointmentDateTime >= $startOfDay && $appointmentDateTime <= $endOfDay;
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
