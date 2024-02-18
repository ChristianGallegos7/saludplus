<?php

namespace App\Http\Controllers;
use App\Models\MedicalAppointment;

use App\Models\Doctor;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Obtén los datos del gráfico llamando al método barChart del ChartController
        $chartController = new ChartController();
        $data = $chartController->barChart();

        // Obtén el resto de los datos que necesitas
        $totalMedicalAppointments = MedicalAppointment::count();
        $totalDoctors = Doctor::count();

        // Pasa todos los datos a la vista
        return view('admin.dashboard', compact('totalMedicalAppointments', 'totalDoctors', 'data'));
    }
}
