<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ARDUFORGE Academy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center font-sans">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-slate-200">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-black text-blue-900">ARDUFORGE</h1>
            <span class="text-xs font-bold text-emerald-500 tracking-widest uppercase">Academy - Registro Institucional</span>
        </div>

        <!-- Mostrar errores de validación (incluyendo si el correo no es de la U) -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 p-3 rounded-xl text-xs mb-4">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 uppercase">Nombre Completo</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase">Correo Institucional</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="tu.nombre@ucundinamarca.edu.co" required
                    class="mt-1 w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
                <span class="text-[10px] text-slate-400 mt-1 block">Debe terminar en @ucundinamarca.edu.co</span>
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-slate-700 uppercase">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="mt-1 w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <button type="submit" class="w-full bg-[#1b55af] hover:bg-blue-800 text-white font-bold py-3 rounded-xl text-sm transition shadow-md">
                Crear Cuenta Institucional
            </button>
        </form>

        <p class="text-center text-xs text-slate-500 mt-6">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Iniciar Sesión</a>
        </p>

    </div>

</body>
</html>