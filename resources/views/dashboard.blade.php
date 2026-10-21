<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Principal - Arduforge Academy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FCF7F7] flex font-sans text-slate-800 h-screen overflow-hidden">

    <!-- BARRA LATERAL (Sidebar) -->
    <aside class="w-64 bg-white flex flex-col justify-between py-6 border-r border-slate-100 shrink-0 z-20">
        <div>
            <!-- Logo Institucional -->
            <div class="text-center mb-10 px-6">
                <h1 class="text-xl font-black text-[#125B9E]">ARDUFORGE</h1>
                <span class="text-[10px] font-bold text-emerald-500 tracking-widest uppercase">Academy</span>
            </div>
            
            <!-- Menú de Navegación Interactivo -->
            <nav class="space-y-1 text-sm font-bold text-slate-500">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-8 py-3 bg-slate-100 text-[#125B9E] border-l-4 border-[#125B9E] hover:bg-slate-200 transition">
                    <span class="text-lg">⊞</span> Inicio
                </a>
                <a href="{{ route('cursos.index') }}" class="flex items-center gap-3 px-8 py-3 hover:bg-slate-50 hover:text-[#125B9E] transition border-l-4 border-transparent hover:border-slate-300">
                    <span class="text-lg">📚</span> Mis Cursos
                </a>
                <a href="{{ route('laboratorio') }}" class="flex items-center gap-3 px-8 py-3 hover:bg-slate-50 hover:text-[#125B9E] transition border-l-4 border-transparent hover:border-slate-300">
                    <span class="text-lg">🔬</span> Laboratorio Arduino
                </a>
                <a href="{{ route('niveles') }}" class="flex items-center gap-3 px-8 py-3 hover:bg-slate-50 hover:text-[#125B9E] transition border-l-4 border-transparent hover:border-slate-300">
                    <span class="text-lg">📊</span> Niveles
                </a>
                <a href="{{ route('certificados') }}" class="flex items-center gap-3 px-8 py-3 hover:bg-slate-50 hover:text-[#125B9E] transition border-l-4 border-transparent hover:border-slate-300">
                    <span class="text-lg">🏆</span> Certificados
                </a>
                <a href="{{ route('ajustes') }}" class="flex items-center gap-3 px-8 py-3 hover:bg-slate-50 hover:text-[#125B9E] transition border-l-4 border-transparent hover:border-slate-300">
                    <span class="text-lg">⚙️</span> Ajustes
                </a>
            </nav>
        </div>
        
        <!-- Botón Cerrar Sesión -->
        <form method="POST" action="{{ route('logout') }}" class="px-8 mt-8">
            @csrf
            <button type="submit" class="flex items-center gap-2 text-sm font-bold text-yellow-600 hover:text-red-600 w-full transition">
                <span class="text-lg">🚪</span> Cerrar Sesión
            </button>
        </form>
    </aside>

    <!-- ÁREA DE CONTENIDO PRINCIPAL -->
    <div class="flex-1 flex flex-col h-screen overflow-y-auto relative">
        
        <!-- BARRA SUPERIOR BLANCA (Perfil de Usuario) -->
        <header class="flex justify-end items-center px-10 py-4 bg-white shrink-0 z-10 border-b border-slate-100">
             <div class="flex items-center gap-5">
                 <button class="text-slate-400 hover:text-blue-500 transition text-xl">🔔</button>
                 <div class="flex items-center gap-3 pl-5 border-l border-slate-200">
                     <div class="text-right">
                         <p class="font-bold text-sm text-slate-800">{{ $user->name }}</p>
                         <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-wide">Estudiante</p>
                     </div>
                     <!-- Avatar Placeholder -->
                     <div class="h-9 w-9 bg-slate-200 rounded-full flex items-center justify-center font-bold uppercase text-slate-600 shadow-inner hover:bg-slate-300 transition cursor-pointer">
                         {{ substr($user->name, 0, 1) }}
                     </div>
                 </div>
             </div>
        </header>

        <!-- GRAN CONTENEDOR AZUL (Hero + Cursos Recientes) -->
        <div class="bg-[#125B9E] px-10 pt-10 pb-12 flex-shrink-0">
            <div class="flex flex-col lg:flex-row gap-8 justify-between items-stretch">
                
                <!-- Columna Izquierda: Saludo y Progreso -->
                <div class="flex-1 flex flex-col justify-center">
                    <h2 class="text-4xl font-extrabold text-white mb-1">Hola, {{ explode(' ', $user->name)[0] }}</h2>
                    <p class="text-blue-200 text-sm mb-8 font-medium">Continúa avanzando hacia tu meta.</p>
                    
                    <!-- Tarjeta de Progreso -->
                    <div class="bg-[#1a6cbbe1] border border-[#3b85cf] rounded-2xl p-6 flex flex-wrap items-center gap-6 shadow-inner">
                        <div class="text-4xl font-black text-white w-20">{{ $progresoGeneral }}%</div>
                        <div class="h-12 w-px bg-blue-300/30 hidden sm:block"></div>
                        <div class="text-white min-w-[100px]">
                            <p class="font-bold leading-tight text-lg">Progreso<br>General</p>
                        </div>
                        <div class="h-12 w-px bg-blue-300/30 hidden sm:block"></div>
                        <div class="flex flex-col gap-1 min-w-[100px] text-center sm:text-left">
                            <span class="text-sm font-bold text-white">Nivel {{ $nivel }}</span>
                            <span class="text-[11px] font-bold text-emerald-400 bg-blue-900/30 px-2 py-1 rounded-md">{{ number_format($puntos) }} pts</span>
                        </div>
                        
                        <div class="flex flex-col gap-2 flex-1 min-w-[180px]">
                            <button class="bg-[#125B9E] hover:bg-blue-900 transition rounded-lg px-3 py-2 text-[11px] font-bold text-white flex items-center gap-2 text-left">
                                <span class="text-yellow-400 text-sm">🔥</span> 
                                <span>RETO DEL DÍA<br><span class="text-blue-200 font-normal">Mantener racha</span></span>
                            </button>
                            <button class="bg-[#125B9E] hover:bg-blue-900 transition rounded-lg px-3 py-2 text-[11px] font-bold text-white flex items-center gap-2 text-left">
                                <span class="text-purple-400 text-sm">🎮</span> 
                                <span>PRÁCTICA RÁPIDA<br><span class="text-blue-200 font-normal">Quiz de Lógica</span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Tarjeta Curso Actual -->
                <div class="w-full lg:w-[320px] bg-white rounded-3xl p-6 shadow-xl flex flex-col justify-between shrink-0">
                    @if($cursoActual)
                        <div>
                            <span class="bg-blue-100 text-[#125B9E] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">En curso</span>
                            <h3 class="text-2xl font-black mt-4 mb-2 text-slate-800 leading-tight">{{ $cursoActual->titulo }}</h3>
                            <p class="text-xs text-slate-500 font-medium mb-1">Primeros pasos, IDE y proyectos básicos</p>
                            <p class="text-xs text-slate-500 font-medium mb-6">{{ $cursoActual->modulo_actual }}</p>
                        </div>
                        <a href="{{ route('cursos.index') }}" class="w-full bg-[#125B9E] hover:bg-blue-900 text-white font-bold py-3.5 rounded-xl text-sm transition shadow-md flex items-center justify-center gap-2">
                            ▶ Continuar último curso
                        </a>
                    @else
                        <div class="text-center flex flex-col items-center justify-center h-full">
                            <span class="text-4xl mb-4 transform hover:scale-110 transition duration-300">🚀</span>
                            <h3 class="text-xl font-black mb-2 leading-tight text-slate-800">¡Bienvenido!</h3>
                            <p class="text-xs text-slate-500 font-medium mb-6">Tu viaje de aprendizaje inicia aquí.</p>
                            <!-- El botón ahora es un enlace interactivo <a> -->
                            <a href="{{ route('cursos.index') }}" class="w-full bg-[#125B9E] hover:bg-blue-900 text-white font-bold py-3.5 rounded-xl text-sm transition shadow-md flex items-center justify-center gap-2">
                                ▶ Explorar Cursos
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Cursos Recientes -->
            <div class="mt-12">
                <div class="flex justify-between items-end mb-4 px-1">
                    <h3 class="font-bold text-white text-sm">Tus cursos recientes</h3>
                    <a href="{{ route('cursos.index') }}" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 transition">Ver todos</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    @forelse($cursosRecientes as $curso)
                        <a href="{{ route('cursos.index') }}" class="bg-white rounded-2xl p-4 flex gap-4 items-center shadow-lg hover:-translate-y-1 transition duration-300">
                            <div class="h-12 w-12 bg-slate-100 rounded-xl flex items-center justify-center text-xl shrink-0">
                                {{ $curso->icono ?? '📚' }}
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <p class="font-bold text-sm text-slate-800 mb-2 truncate">{{ $curso->titulo }}</p>
                                <div class="w-full bg-slate-200 rounded-full h-1.5 mb-1.5">
                                    <div class="bg-emerald-400 h-1.5 rounded-full" style="width: {{ $curso->progreso }}%"></div>
                                </div>
                                <span class="text-[10px] font-bold text-[#125B9E]">Continuar ></span>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-3 bg-white/10 border border-white/20 rounded-2xl p-6 text-center text-white backdrop-blur-sm">
                            <p class="font-bold text-sm mb-1">No tienes cursos recientes.</p>
                            <p class="text-xs text-blue-200">Visita el catálogo para inscribirte en tu primer curso.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- SECCIÓN INFERIOR BLANCA -->
        <div class="p-10 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                <h4 class="font-extrabold text-slate-800 mb-6 text-sm">Novedades de la Comunidad</h4>
                <div class="space-y-6">
                    <div class="flex gap-4 hover:bg-slate-50 p-2 rounded-xl transition cursor-pointer">
                        <div class="h-9 w-9 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center shrink-0 text-sm">💬</div>
                        <div>
                            <p class="font-bold text-sm text-slate-800">Nuevo debate: Optimización de código</p>
                            <p class="text-xs text-slate-500 mt-1 font-medium">Carlos R. publicó una duda sobre arrays en C++.</p>
                        </div>
                    </div>
                    <hr class="border-slate-50">
                    <div class="flex gap-4 hover:bg-slate-50 p-2 rounded-xl transition cursor-pointer">
                        <div class="h-9 w-9 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center shrink-0 text-sm">📄</div>
                        <div>
                            <p class="font-bold text-sm text-slate-800">Artículo recomendado: IoT en 2026</p>
                            <p class="text-xs text-slate-500 mt-1 font-medium">Lectura de 5 minutos sobre tendencias.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                <h4 class="font-extrabold text-slate-800 mb-6 text-sm">Próximos Eventos</h4>
                <div class="space-y-4">
                    <div class="flex gap-4 items-center hover:bg-slate-50 p-2 rounded-xl transition cursor-pointer">
                        <div class="text-center w-10 shrink-0">
                            <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-wide">Oct</p>
                            <p class="text-xl font-black text-slate-800">24</p>
                        </div>
                        <div class="pl-4 border-l-2 border-slate-100">
                            <p class="font-bold text-sm text-slate-800">Webinar: IoT Industrial</p>
                            <p class="text-[11px] text-slate-500 font-medium mt-0.5">10:00 AM - Zoom</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-center pt-4 border-t border-slate-50 hover:bg-slate-50 p-2 rounded-xl transition cursor-pointer">
                        <div class="text-center w-10 shrink-0">
                            <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-wide">Oct</p>
                            <p class="text-xl font-black text-slate-800">28</p>
                        </div>
                        <div class="pl-4 border-l-2 border-slate-100">
                            <p class="font-bold text-sm text-slate-800">Competición de Arduino</p>
                            <p class="text-[11px] text-slate-500 font-medium mt-0.5">2026 - Evento Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</body>
</html>