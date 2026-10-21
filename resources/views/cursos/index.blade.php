<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Cursos - Arduforge Academy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex font-sans text-slate-800 h-screen overflow-hidden bg-white">

    <!-- BARRA LATERAL (Sidebar) -->
    <aside class="w-64 bg-white flex flex-col justify-between py-6 border-r border-slate-100 shrink-0 z-20">
        <div>
            <!-- Logo Institucional -->
            <div class="text-center mb-10 px-6">
                <h1 class="text-xl font-black text-[#125B9E]">ARDUFORGE</h1>
                <span class="text-[10px] font-bold text-emerald-400 tracking-widest uppercase">Academy</span>
            </div>
            
            <!-- Menú de Navegación -->
            <nav class="space-y-2 text-sm font-bold text-slate-500 px-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-50 hover:text-[#125B9E] transition">
                    <span class="text-lg">⊞</span> Inicio
                </a>
                
                <!-- ESTADO ACTIVO: Mis Cursos -->
                <a href="{{ route('cursos.index') }}" class="flex items-center gap-4 px-4 py-3 bg-blue-50 text-[#125B9E] rounded-xl transition">
                    <span class="text-lg">📚</span> Mis Cursos
                </a>
                
                <a href="{{ route('laboratorio') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-50 hover:text-[#125B9E] transition">
                    <span class="text-lg">🔬</span> Laboratorio Arduino
                </a>
                <a href="{{ route('niveles') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-50 hover:text-[#125B9E] transition">
                    <span class="text-lg">📊</span> Niveles
                </a>
                <a href="{{ route('certificados') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-50 hover:text-[#125B9E] transition">
                    <span class="text-lg">🏆</span> Certificados
                </a>
                <a href="{{ route('ajustes') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-50 hover:text-[#125B9E] transition">
                    <span class="text-lg">⚙️</span> Ajustes
                </a>
            </nav>
        </div>
        
        <!-- Botón Cerrar Sesión -->
        <form method="POST" action="{{ route('logout') }}" class="px-8 mt-8">
            @csrf
            <button type="submit" class="flex items-center gap-3 text-sm font-bold text-red-500 hover:text-red-700 w-full transition">
                <span class="text-lg">↪</span> Cerrar Sesión
            </button>
        </form>
    </aside>

    <!-- ÁREA DE CONTENIDO PRINCIPAL (Con fondo punteado) -->
    <div class="flex-1 flex flex-col h-screen overflow-y-auto relative bg-[#f9fafb] bg-[radial-gradient(#d1d5db_1.5px,transparent_1.5px)] [background-size:24px_24px]">
        
        <!-- BARRA SUPERIOR (Header) -->
        <header class="flex justify-between items-center px-10 py-5 shrink-0 z-10 sticky top-0 bg-[#f9fafb]/90 backdrop-blur-md border-b border-slate-200/50">
             <div>
                 <h2 class="text-2xl font-extrabold text-[#125B9E]">Mis Cursos</h2>
                 <p class="text-xs text-slate-500 font-medium mt-0.5">Continúa tu viaje de aprendizaje</p>
             </div>
             
             <!-- Perfil Usuario -->
             <div class="flex items-center gap-6">
                 <button class="text-slate-400 hover:text-blue-500 transition text-xl">🔔</button>
                 <div class="flex items-center gap-4 pl-6 border-l border-slate-300">
                     <div class="text-right">
                         <p class="font-bold text-sm text-slate-800 leading-tight">{{ explode(' ', $user->name)[0] }}</p>
                         <p class="text-[10px] font-bold text-[#125B9E] bg-blue-100 px-2 py-0.5 rounded-full mt-0.5 inline-block">Estudiante</p>
                     </div>
                     <div class="h-9 w-9 bg-slate-200 rounded-full flex items-center justify-center font-bold uppercase text-slate-600 shadow-inner">
                         {{ substr($user->name, 0, 1) }}
                     </div>
                 </div>
             </div>
        </header>

        <!-- SECCIÓN DE CUADRADOS (GRID 2 COLUMNAS FIJO) -->
        <div class="p-8 flex justify-center">
            <div class="w-full max-w-[1400px]">
                
                <!-- Cambiado a grid-cols-2 directo para forzar los dos cuadros por fila -->
                <div class="grid grid-cols-2 gap-6">
                    
                    @foreach($cursos as $curso)
                    <!-- Tarjeta de Curso en Cuadrado Independiente -->
                    <div class="bg-white rounded-[2rem] p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] border border-slate-100 flex flex-col justify-between">
                        
                        <!-- Contenido Superior -->
                        <div class="flex gap-5 items-start">
                            <div class="h-20 w-20 {{ $curso->bg_color }} rounded-[1.2rem] flex items-center justify-center text-3xl shrink-0 shadow-sm border border-slate-100/50">
                                {{ $curso->icono }}
                            </div>
                            
                            <div class="flex-1 pt-0.5">
                                <div class="flex justify-between items-center w-full mb-2">
                                    @if($curso->estado == 'EN CURSO')
                                        <span class="bg-blue-100 text-blue-600 text-[9px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider">En Curso</span>
                                    @elseif($curso->estado == 'COMPLETADO')
                                        <span class="bg-green-100 text-green-600 text-[9px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider">Completado</span>
                                    @else
                                        <span class="bg-purple-100 text-purple-600 text-[9px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider">Nuevo</span>
                                    @endif
                                    
                                    <button class="text-slate-300 hover:text-slate-500 font-bold tracking-widest text-lg leading-none">•••</button>
                                </div>
                                
                                <h3 class="text-[18px] font-extrabold text-slate-800 leading-tight mb-1">{{ $curso->titulo }}</h3>
                                <p class="text-[12px] text-slate-500 font-medium leading-relaxed line-clamp-2">{{ $curso->descripcion }}</p>
                            </div>
                        </div>

                        <!-- Contenido Inferior (Progreso y Botón) -->
                        <div class="mt-6 pt-5 border-t border-slate-100 border-dashed">
                            <div class="mb-5">
                                <div class="flex justify-between items-end mb-1.5">
                                    <span class="text-[12px] font-extrabold text-slate-800">Progreso General</span>
                                    <span class="text-[12px] font-extrabold {{ $curso->progreso > 0 ? 'text-[#125B9E]' : 'text-slate-400' }}">{{ $curso->progreso }}%</span>
                                </div>
                                
                                <div class="w-full bg-slate-200 rounded-full h-2 mb-1.5 overflow-visible">
                                    <div class="bg-[#6ada6a] h-2 rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(106,218,106,0.5)]" style="width: {{ $curso->progreso }}%"></div>
                                </div>
                                
                                <p class="text-right text-[10px] text-slate-400 font-bold">{{ $curso->modulo_actual }}</p>
                            </div>

                            @if($curso->estado == 'COMPLETADO')
                                <button class="w-full bg-[#78D678] hover:bg-[#65c565] text-white font-extrabold py-3.5 rounded-xl text-[14px] transition shadow-[0_6px_15px_rgba(120,214,120,0.3)]">
                                    Repasar Contenido ↺
                                </button>
                            @elseif($curso->estado == 'EN CURSO')
                                <button class="w-full bg-[#125B9E] hover:bg-blue-900 text-white font-extrabold py-3.5 rounded-xl text-[14px] transition shadow-[0_6px_15px_rgba(18,91,158,0.25)]">
                                    Continuar Aprendiendo →
                                </button>
                            @else
                                <button class="w-full bg-[#125B9E] hover:bg-blue-900 text-white font-extrabold py-3.5 rounded-xl text-[14px] transition shadow-[0_6px_15px_rgba(18,91,158,0.25)]">
                                    Empezar Curso ▶
                                </button>
                            @endif
                        </div>
                        
                    </div>
                    @endforeach

                </div>
                
                <!-- Pie de página -->
                <div class="text-center mt-10 mb-8">
                    <p class="text-[12px] text-slate-500 font-medium">
                        ¿Buscas más desafíos? <a href="#" class="text-[#78D678] font-extrabold hover:underline">Explora el catálogo completo</a>
                    </p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>