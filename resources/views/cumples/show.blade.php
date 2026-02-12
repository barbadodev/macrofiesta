@extends('layouts.plantilla')

@section('title', 'ENTRADA-MACROFIESTA - ' . $invitado->nombre_apellidos)

@section('content')
<style>
    body {
        margin: 0;
        background-color: #f0f4f8;
        min-height: 100vh;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
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

    .ticket-cut {
        position: relative;
    }
    .ticket-cut::before, .ticket-cut::after {
        content: "";
        position: absolute;
        width: 30px;
        height: 30px;
        background: #f0f4f8; 
        border-radius: 50%;
        top: 48%; 
        z-index: 10;
    }
    .ticket-cut::before { left: -16px; border-right: 1px solid rgba(255, 255, 255, 0.4); }
    .ticket-cut::after { right: -16px; border-left: 1px solid rgba(255, 255, 255, 0.4); }
</style>

<div class="min-h-screen w-full animate-gradient flex flex-col items-center justify-center py-12 px-6">
    
    <div class="relative w-full max-w-md">
        
        <div class="absolute -top-12 -left-12 w-48 h-48 bg-purple-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50"></div>
        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-pink-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50"></div>

        <div class="relative glass-light rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.03)] overflow-hidden ticket-cut">
            
            <div class="pt-12 pb-8 px-10 text-center border-b border-dashed border-slate-200/80">
                <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-tr from-purple-400 to-pink-400 rounded-[2rem] flex items-center justify-center shadow-lg shadow-purple-500/20 transform rotate-3">
                    <span class="text-4xl font-black text-white italic">
                        {{ substr($invitado->nombre_apellidos, 0, 1) }}
                    </span>
                </div>
                
                <span class="inline-block px-4 py-1 rounded-full bg-purple-500/10 text-purple-500 text-[10px] font-black uppercase tracking-[0.3em] mb-3">
                    PASE INVITADO/A
                </span>
                
                <h1 class="text-3xl font-black text-slate-800 uppercase tracking-tighter leading-none">
                    {{ $invitado->nombre_apellidos }}
                </h1>
            </div>

            <div class="p-10 space-y-8">
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-3 p-3 rounded-2xl {{ $invitado->tinto == 'si' ? 'bg-purple-500/10 border border-purple-500/20' : 'opacity-30 grayscale' }}">
                        <span class="text-xl">🍷</span>
                        <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Tinto</span>
                        @if($invitado->tinto == 'si') <span class="text-purple-500 ml-auto text-xs">✓</span> @endif
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-2xl {{ $invitado->cerveza == 'si' ? 'bg-purple-500/10 border border-purple-500/20' : 'opacity-30 grayscale' }}">
                        <span class="text-xl">🍺</span>
                        <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Cerveza</span>
                        @if($invitado->cerveza == 'si') <span class="text-purple-500 ml-auto text-xs">✓</span> @endif
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-2xl {{ $invitado->copas  ? 'bg-purple-500/10 border border-purple-500/20' : 'opacity-30 grayscale' }}">
                        <span class="text-xl">🥂</span>
                        <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Copas</span>
                        @if($invitado->copas ) <span class="text-purple-500 ml-auto text-xs">✓</span> @endif
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-2xl {{ $invitado->refrescos == 'si' ? 'bg-purple-500/10 border border-purple-500/20' : 'opacity-30 grayscale' }}">
                        <span class="text-xl">🥤</span>
                        <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Refrescos</span>
                        @if($invitado->refrescos == 'si') <span class="text-purple-500 ml-auto text-xs">✓</span> @endif
                    </div>
                </div>

                @if($invitado->copas)
                <div class="grid grid-cols-2 gap-8">
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] opacity-70">Alcohol</span>
                        <span class="text-slate-800 text-xl font-black italic">{{ $invitado->copas ?? 'No especificado' }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] opacity-70">Mezcla</span>
                        <span class="text-slate-800 text-xl font-black italic">{{ $invitado->mezcla ?? 'Sola' }}</span>
                    </div>
                </div>
                @endif

                @if($invitado->observaciones)
                <div class="mt-6 p-4 rounded-2xl bg-pink-500/5 border border-pink-500/10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-2 opacity-10 text-pink-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
                        </svg>
                    </div>
                    <span class="text-[9px] font-black text-pink-500 uppercase tracking-[0.2em] opacity-70 block mb-2">
                        Notas de la Organización
                    </span>
                    <p class="text-slate-600 text-xs font-bold leading-relaxed italic">
                        "{{ $invitado->observaciones }}"
                    </p>
                </div>
                @endif

                <div class="pt-4 flex flex-col gap-4">
                    <a href="{{ route('cumples.edit', $invitado) }}" 
                        class="group relative w-full h-14 bg-slate-800 rounded-2xl overflow-hidden flex items-center justify-center transition-all duration-500 hover:scale-[1.02] active:scale-95 shadow-md">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <span class="relative text-white font-black text-[10px] tracking-[0.3em] uppercase">
                            EDITAR MI PASE
                        </span>
                    </a>
                    
                    <div class="flex flex-col gap-2 border-t border-slate-100 pt-6">
                        <a href="{{ route('cumples.create') }}" 
                            class="text-[9px] font-black text-gray-400 hover:text-purple-500 text-center uppercase tracking-[0.4em] transition-all duration-300">
                            ← Volver al registro
                        </a>
                        <a href="{{ route('cumples.index') }}" 
                            class="text-[9px] font-black text-gray-400 hover:text-purple-500 text-center uppercase tracking-[0.4em] transition-all duration-300">
                            ← ADMIN
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white/40 py-6 text-center border-t border-slate-100">
                <p class="text-[10px] font-mono text-gray-400 uppercase tracking-tighter">
                    ID: #00{{ $invitado->id }} | MACROFIESTA TRANCHETE 2026
                </p>
                <p class="text-[9px] font-mono text-gray-400 mt-1 opacity-50">
                    Developed by @antoniobarbado_
                </p>
            </div>
        </div>
    </div>

    <div class="w-full max-w-4xl mt-12 mb-16 px-4">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10">
            <div class="flex flex-col items-center gap-4">
                <a href="{{ route('cumples.vestimenta') }}" class="group relative h-48 w-full max-w-[280px] md:w-64 rounded-[2rem] bg-white/40 border border-white shadow-sm overflow-hidden transform hover:scale-[1.05] transition-all">
                    <img src="{{ asset('img/vestimenta.jpg')}}" class="w-full h-full object-cover">
                </a>
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">VESTIMENTA</span>
            </div>
            <div class="flex flex-col items-center gap-4">
                <a href="{{ route('cumples.sitio') }}" class="group relative h-48 w-full max-w-[280px] md:w-64 rounded-[2rem] bg-white/40 border border-white shadow-sm overflow-hidden transform hover:scale-[1.05] transition-all">
                    <img src="{{ asset('img/18.jpg') }}" class="w-full h-full object-cover">
                </a>
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">SITIO</span>
            </div>
        </div>
    </div>
</div>
@endsection