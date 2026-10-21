<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Variables dinámicas (inician en 0 para usuarios nuevos)
        $progresoGeneral = 0;
        $nivel = 1;
        $puntos = 0;
        
        // Arreglo vacío porque un usuario nuevo no tiene cursos iniciados
        $cursosRecientes = []; 
        $cursoActual = null;

        return view('dashboard', compact('user', 'progresoGeneral', 'nivel', 'puntos', 'cursosRecientes', 'cursoActual'));
    }
}