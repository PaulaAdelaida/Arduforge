<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirige la raíz del proyecto directamente al login
Route::get('/', function () {
    return redirect('/login');
});

// Rutas de Registro
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Rutas de Login y Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store'); // <-- Aquí se define el nombre route('login.store')
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// RUTAS PROTEGIDAS DEL ESTUDIANTE (Requieren inicio de sesión)
Route::middleware('auth')->group(function () {
    
    // Panel Principal (Dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas del menú lateral de la academia
    Route::get('/mis-cursos', [CourseController::class, 'index'])->name('cursos.index');
    Route::get('/laboratorio', function() { return "Laboratorio Arduino (En construcción)"; })->name('laboratorio');
    Route::get('/niveles', function() { return "Sistema de Niveles (En construcción)"; })->name('niveles');
    Route::get('/certificados', function() { return "Tus Certificados (En construcción)"; })->name('certificados');
    Route::get('/ajustes', function() { return "Ajustes de Perfil (En construcción)"; })->name('ajustes');
});