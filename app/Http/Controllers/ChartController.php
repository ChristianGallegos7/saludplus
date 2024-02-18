<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalAppointment;
use App\Models\Doctor;

class ChartController extends Controller
{
    public function barChart()
    {
        $totalMedicalAppointments = MedicalAppointment::count();
        $totalDoctors = Doctor::count();

        $data = [
            'labels' => ['Citas Médicas', 'Doctores'],
            'data' => [$totalMedicalAppointments, $totalDoctors],
        ];

        return view('bar-chart', compact('data'));
    }
}

