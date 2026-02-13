@extends('layouts.plantilla')

@section('title', 'EDITAR-ENTRADA - ' . $invitado->nombre_apellidos)

@section('content')
    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        body {
            margin: 0;
            background-color: #ec4899; 
            min-height: 100vh;
        }

        .animate-gradient {
            background: linear-gradient(-100deg, #f584bc, #f29fff, #f892a3);
            background-size: 400% 400%;
            animation: gradient 10s ease infinite;
            min-height: 100vh; 
            width: 100%;
        }

        .glass-light {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .checkbox-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        input[type="checkbox"]:checked+.checkbox-content {
            background-color: rgba(168, 85, 247, 0.1);
            border-color: #a855f7;
            transform: scale(1.02);
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="min-h-screen w-full animate-gradient flex flex-col items-center py-12 px-6">
        <div class="relative w-full max-w-md pb-12">

            <div class="absolute -top-12 -left-12 w-48 h-48 bg-purple-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50"></div>
            <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-pink-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50"></div>

            <div class="relative glass-light rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.03)] overflow-hidden">

                <div class="pt-12 pb-8 px-10 text-center">
                    <span class="inline-block px-4 py-1 rounded-full bg-purple-500/10 text-purple-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 border border-purple-500/20">
                        Modo Edición • VIP ID #{{ $invitado->id }}
                    </span>
                    <h1 class="text-4xl font-black text-slate-800 italic tracking-tighter uppercase leading-none">
                        ACTUALIZAR <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">DATOS</span>
                    </h1>
                </div>

                <form action="{{ route('cumples.update', $invitado) }}" method="POST" class="p-10 pt-0 space-y-8" novalidate>
                    @csrf
                    @method('put')

                    <div class="group relative">
                        <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Nombre y Apellidos</label>
                        <input type="text" name="nombre_apellidos" value="{{ old('nombre_apellidos', $invitado->nombre_apellidos) }}"
                            class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300">
                        @error('nombre_apellidos')
                            <p class="text-[9px] text-pink-500 font-black uppercase mt-1 ml-1 tracking-widest">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70">¿Qué vas a tomar?</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="checkbox-card cursor-pointer">
                                <input type="checkbox" name="tinto" value="si" class="hidden peer" {{ old('tinto', $invitado->tinto) == 'si' ? 'checked' : '' }}>
                                <div class="checkbox-content flex flex-col items-center p-4 rounded-2xl border border-slate-100 bg-white/50 transition-all">
                                    <span class="text-2xl mb-1">🍷</span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Tinto</span>
                                </div>
                            </label>
                            <label class="checkbox-card cursor-pointer">
                                <input type="checkbox" name="cerveza" value="si" class="hidden peer" {{ old('cerveza', $invitado->cerveza) == 'si' ? 'checked' : '' }}>
                                <div class="checkbox-content flex flex-col items-center p-4 rounded-2xl border border-slate-100 bg-white/50 transition-all">
                                    <span class="text-2xl mb-1">🍺</span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Cerveza</span>
                                </div>
                            </label>
                            <label class="checkbox-card cursor-pointer">
                                <input type="checkbox" name="copas_check" value="si" id="checkCopas" class="hidden peer" 
                                    {{ (old('copas', $invitado->copas) != '' && old('copas', $invitado->copas) != null) ? 'checked' : '' }}>
                                <div class="checkbox-content flex flex-col items-center p-4 rounded-2xl border border-slate-100 bg-white/50 transition-all">
                                    <span class="icon text-2xl mb-1 transition-transform">🥂</span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Copas</span>
                                </div>
                            </label>
                            <label class="checkbox-card cursor-pointer">
                                <input type="checkbox" name="refrescos" value="si" class="hidden peer" {{ old('refrescos', $invitado->refrescos) == 'si' ? 'checked' : '' }}>
                                <div class="checkbox-content flex flex-col items-center p-4 rounded-2xl border border-slate-100 bg-white/50 transition-all">
                                    <span class="icon text-2xl mb-1 transition-transform">🥤</span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Refrescos</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div id="desplegableCopas" class="hidden animate-fade-in border-l-4 border-purple-400 pl-4 bg-purple-50/30 py-4 rounded-r-2xl space-y-6">
                        <div class="grid grid-cols-2 gap-8">
                            <div class="group relative">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Alcohol</label>
                                <input type="text" name="copas" value="{{ old('copas', $invitado->copas) }}"
                                    class="w-full bg-transparent border-0 border-b border-slate-300 px-0 py-2 text-sm text-slate-700 focus:ring-0 focus:border-purple-400 transition-all"
                                    placeholder="Ron, Gin...">
                            </div>
                            <div class="group relative">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Mezcla</label>
                                <input type="text" name="mezcla" value="{{ old('mezcla', $invitado->mezcla) }}"
                                    class="w-full bg-transparent border-0 border-b border-slate-300 px-0 py-2 text-sm text-slate-700 focus:ring-0 focus:border-purple-400 transition-all"
                                    placeholder="Cola, Limón...">
                            </div>
                        </div>
                    </div>

                    <div class="group relative">
                        <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Observaciones</label>
                        <textarea name="observaciones" rows="3"
                            class="w-full bg-white/20 border border-slate-200/50 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all placeholder:text-slate-300 resize-none"
                            placeholder="Actualiza tus sugerencias">{{ old('observaciones', $invitado->observaciones) }}</textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="group relative w-full h-16 bg-slate-800 rounded-2xl overflow-hidden transition-all duration-500 hover:scale-[1.02] active:scale-95 shadow-md">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <span class="relative text-white font-black text-xs tracking-[0.4em] uppercase">
                                GUARDAR CAMBIOS
                            </span>
                        </button>
                    </div>
                </form>

                <div class="bg-white/40 py-8 text-center border-t border-slate-100">
                    <a href="{{ route('cumples.show', $invitado) }}"
                        class="text-[9px] font-black text-gray-400 hover:text-purple-500 uppercase tracking-[0.4em] transition-all duration-300">
                        ← Cancelar y Volver
                    </a>
                </div>

                <div class="bg-white/40 py-6 text-center border-t border-slate-100">
                    <p class="text-[10px] font-mono text-gray-400">
                        Developed by @antoniobarbado_ | @barbadodev on GitHub
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const checkCopas = document.getElementById('checkCopas');
        const desplegable = document.getElementById('desplegableCopas');

        function toggleCopas() {
            if (checkCopas.checked) { 
                desplegable.classList.remove('hidden'); 
            } else { 
                desplegable.classList.add('hidden'); 
            }
        }

        
        checkCopas.addEventListener('change', toggleCopas);

        
        window.addEventListener('load', toggleCopas);

        
        document.querySelector('form').addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            btn.querySelector('span').innerText = "ACTUALIZANDO...";
            btn.style.opacity = "0.8";
        });
    </script>
@endsection