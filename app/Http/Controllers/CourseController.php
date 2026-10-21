<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Simulamos los cursos asignados al usuario nuevo.
        // Todos inician con 0% de progreso y estado NUEVO.
        $cursos = [
            (object)[
                'titulo' => 'Introducción a Arduino',
                'descripcion' => 'Fundamentos de hardware, IDE y tu primer "Hola Mundo" físico.',
                'estado' => 'NUEVO', // Puede ser: NUEVO, EN CURSO, COMPLETADO
                'progreso' => 0,
                'modulo_actual' => 'Módulo 1 de 6 completado',
                'icono' => '🤖',
                'bg_color' => 'bg-red-50'
            ],
            (object)[
                'titulo' => 'Electrónica Básica',
                'descripcion' => 'Voltaje, corriente, resistencia y componentes fundamentales explicados.',
                'estado' => 'NUEVO',
                'progreso' => 0,
                'modulo_actual' => 'Módulo 1 de 5 completado',
                'icono' => '⚡',
                'bg_color' => 'bg-green-50'
            ],
            (object)[
                'titulo' => 'Programación en Arduino',
                'descripcion' => 'Sintaxis C++, estructuras de control, funciones y librerías avanzadas.',
                'estado' => 'NUEVO',
                'progreso' => 0,
                'modulo_actual' => 'Módulo 1 de 8 completado',
                'icono' => '{ }',
                'bg_color' => 'bg-purple-50'
            ],
            (object)[
                'titulo' => 'Circuitos Digitales',
                'descripcion' => 'Interacción con el mundo físico: temperatura, luz, motores y relés.',
                'estado' => 'NUEVO',
                'progreso' => 0,
                'modulo_actual' => 'Módulo 1 de 6 completado',
                'icono' => '🔌',
                'bg_color' => 'bg-orange-50'
            ]
        ];

        return view('cursos.index', compact('user', 'cursos'));
    }
}