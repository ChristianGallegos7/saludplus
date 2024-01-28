<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminmedicalAppointmentController;


Route::get('/', function () {
    return view('principal');
})->name('principal');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::post('logout', [LogOutController::class, 'store'])->name('logout');

//VISTAS QUE EL ADMIN PODRA TENER ACCESO Y PODRA MANIPULAR LOS CRUD DE DOCTORES Y CITAS MEDICAS
Route::get('/panel-admin', [AdminController::class,'index'])->name('admin.dashboard');

// Rutas para las Citas Médicas (Administrador)
Route::get('/admin/citas', [AdminMedicalAppointmentController::class, 'index'])->name('admin.appointments');
Route::get('/admin/citas/crear', [AdminMedicalAppointmentController::class, 'create'])->name('admin.create.appointment');
Route::post('/admin/citas/crear', [AdminMedicalAppointmentController::class, 'store'])->name('admin.store.appointment');
Route::get('/admin/citas/{id}/editar', [AdminMedicalAppointmentController::class, 'edit'])->name('admin.edit.appointment');
Route::put('/admin/citas/{id}', [AdminMedicalAppointmentController::class, 'update'])->name('admin.update.appointment');
Route::delete('/admin/citas/{id}', [AdminMedicalAppointmentController::class, 'destroy'])->name('admin.destroy.appointment');


// Rutas para los Doctores (Administrador)
Route::get('/admin/doctores', [DoctorController::class, 'index'])->name('admin.doctors');
Route::get('/admin/doctores/crear', [DoctorController::class, 'create'])->name('admin.create.doctor');
Route::post('/admin/doctores/crear', [DoctorController::class, 'store']);

