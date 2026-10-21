<aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between hidden md:flex sticky top-0 h-screen">
    <div>
        <div class="p-6 text-center border-b border-slate-100">
            <h1 class="text-xl font-black text-blue-900 tracking-wider">ARDUFORGE</h1>
            <span class="text-xs font-bold text-emerald-500 tracking-widest uppercase">Academy</span>
        </div>

        <nav class="p-4 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-700 font-semibold rounded-xl text-sm">Inicio</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 font-medium rounded-xl text-sm transition">Mis Cursos</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 font-medium rounded-xl text-sm transition">Laboratorio</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 font-medium rounded-xl text-sm transition">Niveles</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 font-medium rounded-xl text-sm transition">Certificados</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 font-medium rounded-xl text-sm transition">Ajustes</a>
        </nav>
    </div>

    <div class="p-4 border-t border-slate-100">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-2 text-amber-600 hover:text-amber-700 font-semibold px-4 py-2 text-sm transition">
                Cerrar Sesión
            </button>
        </form>
    </div>
</aside>