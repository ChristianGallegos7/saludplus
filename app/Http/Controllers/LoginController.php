<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticar al usuario
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Redireccionar según el rol
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isDoctor()) {
            return redirect()->route('doctor.dashboard');
        } elseif ($user->isPatient()) {
            return redirect()->route('patient.dashboard');
        } else {
            // Redirección por defecto si el usuario no tiene un rol reconocido
            return redirect()->route('principal');
        }
    }

}
