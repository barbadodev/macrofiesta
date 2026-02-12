@extends('layouts.plantilla')

@section('title', 'EDITAR-ENTRADA - ' . $invitado->nombre_apellidos)

@section('content')
    <style>
        body {
            margin: 0;
            background-color: #f0f4f8;
            min-height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background: linear-gradient(-45deg, #eef2ff, #f5f3ff, #ecfdf5, #fff1f2);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            width: 100%;
        }

        .glass-light {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        /* Estilo Slider */
        input[type=range] {
            -webkit-appearance: none;
            width: 100%;
            background: transparent;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 18px;
            width: 18px;
            border-radius: 50%;
            background: #a855f7;
            cursor: pointer;
            margin-top: -6px;
            border: 2px solid white;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.3);
            transition: all 0.3s ease;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 6px;
            background: rgba(168, 85, 247, 0.1);
            border-radius: 10px;
        }

        /* Estilos Checkboxes */
        .checkbox-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        input[type="checkbox"]:checked+.checkbox-content {
            background-color: rgba(168, 85, 247, 0.1);
            border-color: #a855f7;
            transform: scale(1.02);
        }
    </style>

    <div class="min-h-screen w-full animate-gradient flex flex-col items-center py-12 px-6">
        <div class="relative w-full max-w-md pb-12">

            <div
                class="absolute -top-12 -left-12 w-48 h-48 bg-purple-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50">
            </div>
            <div
                class="absolute -bottom-12 -right-12 w-48 h-48 bg-pink-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50">
            </div>

            <div class="relative glass-light rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.03)] overflow-hidden">

                <div class="pt-12 pb-8 px-10 text-center">
                    <span
                        class="inline-block px-4 py-1 rounded-full bg-purple-500/10 text-purple-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 border border-purple-500/20">
                        Modo Edición • VIP ID #{{ $invitado->id }}
                    </span>
                    <h1 class="text-4xl font-black text-slate-800 italic tracking-tighter uppercase leading-none">
                        ACTUALIZAR <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">DATOS</span>
                    </h1>
                    <p class="text-gray-400 mt-4 font-bold tracking-[0.4em] text-[10px] uppercase opacity-60">MACROFIESTA 18
                        TATONA</p>
                </div>

                <form action="{{ route('cumples.update', $invitado) }}" method="POST" class="p-10 pt-0 space-y-8"
                    novalidate>
                    @csrf
                    @method('put')

                    <div class="group relative">
                        <label
                            class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Nombre
                            y Apellidos</label>
                        <input type="text" name="nombre_apellidos"
                            value="{{ old('nombre_apellidos', $invitado->nombre_apellidos) }}"
                            class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300">
                        @error('nombre_apellidos')
                            <p class="text-[9px] text-pink-500 font-black uppercase mt-1 ml-1 tracking-widest">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-4">
                        <label
                            class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70">¿Qué
                            vas a tomar?</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="checkbox-card cursor-pointer">
                                <input type="checkbox" name="tinto" value="si" class="hidden peer"
                                    {{ old('tinto', $invitado->tinto) == 'si' ? 'checked' : '' }}>
                                <div
                                    class="checkbox-content flex flex-col items-center p-4 rounded-2xl border border-slate-100 bg-white/50 transition-all">
                                    <span class="text-2xl mb-1">🍷</span>
                                    <span
                                        class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Tinto</span>
                                </div>
                            </label>
                            <label class="checkbox-card cursor-pointer">
                                <input type="checkbox" name="cerveza" value="si" class="hidden peer"
                                    {{ old('cerveza', $invitado->cerveza) == 'si' ? 'checked' : '' }}>
                                <div
                                    class="checkbox-content flex flex-col items-center p-4 rounded-2xl border border-slate-100 bg-white/50 transition-all">
                                    <span class="text-2xl mb-1">🍺</span>
                                    <span
                                        class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Cerveza</span>
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
                        @if ($errors->has('tinto') || $errors->has('cerveza'))
                            <p class="text-[9px] text-pink-500 font-black uppercase mt-1 text-center tracking-widest">
                                Selecciona al menos Tinto o Cerveza</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="group relative">
                            <label
                                class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Alcohol</label>
                            <input type="text" name="copas" value="{{ old('bebida', $invitado->copas) }}"
                                class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300">
                            @error('bebida')
                                <p class="text-[8px] text-pink-500 font-black uppercase mt-1 tracking-widest">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="group relative">
                            <label
                                class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Mezcla</label>
                            <input type="text" name="mezcla" value="{{ old('mezcla', $invitado->mezcla) }}"
                                class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300">
                            @error('mezcla')
                                <p class="text-[8px] text-pink-500 font-black uppercase mt-1 tracking-widest">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="group relative">
                        <label
                            class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Observaciones</label>
                        <textarea name="observaciones" rows="3"
                            class="w-full bg-white/20 border border-slate-200/50 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all placeholder:text-slate-300 resize-none"
                            placeholder="Actualiza tus sugerencias">{{ old('observaciones', $invitado->observaciones ?? '') }}</textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="group relative w-full h-16 bg-slate-800 rounded-2xl overflow-hidden transition-all duration-500 hover:scale-[1.02] active:scale-95 shadow-md">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
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
                        Developed by <span class="text-purple-400">@antoniobarbado_, @barbadodev in GitHub</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const range = document.getElementById('ganasRange');
        const valueDisplay = document.getElementById('ganasValue');

        range.addEventListener('input', () => {
            const val = range.value;
            if (val < 30) {
                valueDisplay.innerText = val + "% 😴";
            } else if (val >= 90 && val < 100) {
                valueDisplay.innerText = "¡A TOPE! 🔥";
            } else if (val == 100) {
                valueDisplay.innerText = "¡MACROFIESTA! 🚀";
            } else {
                valueDisplay.innerText = val + "%";
            }
        });

        // Feedback en botón
        document.querySelector('form').addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            btn.querySelector('span').innerText = "ACTUALIZANDO...";
            btn.style.opacity = "0.8";
        });
    </script>
@endsection
