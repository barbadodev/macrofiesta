@extends('layouts.plantilla')

@section('title', 'EDITAR-ENTRADA - ' . $invitado->nombre_apellidos)

@section('content')
<style>
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient {
        background: linear-gradient(-45deg, #0f172a, #1e1b4b, #000000, #000000);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }
    .glass-dark {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>

<div class="min-h-screen animate-gradient flex items-center justify-center p-6">
    <div class="relative w-full max-w-lg">
        
        
        <div class="absolute -top-24 -left-24 w-80 h-80 bg-purple-600 rounded-full mix-blend-screen filter blur-[90px] opacity-20 animate-pulse"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-blue-600 rounded-full mix-blend-screen filter blur-[90px] opacity-20 animate-pulse"></div>

        <div class="relative glass-dark rounded-[3rem] shadow-[0_0_50px_rgba(0,0,0,0.5)] overflow-hidden">
            
            <div class="pt-12 pb-8 px-10 text-center">
                <span class="inline-block px-4 py-1 rounded-full bg-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-[0.3em] mb-4 border border-blue-500/30">
                    Modo Edición • VIP ID #{{ $invitado->id }}
                </span>
                <h1 class="text-4xl font-black text-white italic tracking-tighter uppercase leading-none">
                    ACTUALIZAR <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">DATOS</span>
                </h1>
                <p class="text-gray-400 mt-4 font-bold tracking-[0.4em] text-[10px] uppercase opacity-60">MACROFIESTA 18 TATONA</p>
            </div>

            <form action="{{ route('cumples.update', $invitado) }}" method="POST" class="p-10 pt-0 space-y-8">
                @csrf
                @method('put')

                
                <div class="group relative">
                    <label class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Nombre y Apellidos</label>
                    <input type="text" name="nombre_apellidos" value="{{ $invitado->nombre_apellidos }}" required
                        class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-3 text-lg text-white focus:ring-0 focus:border-blue-500 transition-all placeholder:text-white/20">
                </div>

              
                <div class="group relative">
                    <label class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Email de Invitación</label>
                    <input type="email" name="email" value="{{ $invitado->email }}" required
                        class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-3 text-lg text-white focus:ring-0 focus:border-blue-500 transition-all placeholder:text-white/20">
                </div>

                <div class="grid grid-cols-2 gap-8">
                    
                    <div class="group relative">
                        <label class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Bebida</label>
                        <input type="text" name="bebida_alcoholica" value="{{ $invitado->bebida_alcoholica }}"
                            class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-3 text-lg text-white focus:ring-0 focus:border-blue-500 transition-all placeholder:text-white/20">
                    </div>
                    
                    <div class="group relative">
                        <label class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Mezcla</label>
                        <input type="text" name="mezcla" value="{{ $invitado->mezcla }}"
                            class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-3 text-lg text-white focus:ring-0 focus:border-blue-500 transition-all placeholder:text-white/20">
                    </div>
                </div>

                <div class="pt-8 flex flex-col gap-4">
                    <button type="submit" 
                        class="group relative w-full h-16 bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:scale-[1.02] active:scale-95 shadow-[0_0_30px_rgba(255,255,255,0.05)]">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <span class="relative text-black group-hover:text-white font-black text-xs tracking-[0.4em] uppercase transition-colors duration-500">
                            CONFIRMAR CAMBIOS
                        </span>
                    </button>
                    
                    <a href="{{ route('cumples.show', $invitado) }}" class="text-center py-2 text-[9px] font-black text-gray-500 hover:text-white uppercase tracking-[0.4em] transition-all">
                        Cancelar y volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection