@extends('layouts.plantilla')

@section('title', 'ENTRADA-MACROFIESTA' . $invitado->nombre_apellidos)

@section('content')
<style>
    @keyframes pulse-glow {
        0%, 100% { opacity: 0.2; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(1.1); }
    }
    .animate-pulse-glow { animation: pulse-glow 4s ease-in-out infinite; }
    
    .glass-ticket {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }
    
    .glass-ticket::before, .glass-ticket::after {
        content: "";
        position: absolute;
        width: 40px;
        height: 40px;
        background: #000;
        border-radius: 50%;
        top: 60%;
    }
    .glass-ticket::before { left: -25px; }
    .glass-ticket::after { right: -25px; }
</style>

<div class="min-h-screen bg-black flex flex-col items-center justify-center p-4 sm:p-6">
    
    
    <div class="absolute top-1/3 left-1/4 w-72 h-72 bg-purple-600/30 rounded-full blur-[100px] animate-pulse-glow"></div>
    <div class="absolute bottom-1/3 right-1/4 w-72 h-72 bg-pink-600/30 rounded-full blur-[100px] animate-pulse-glow"></div>

    <div class="max-w-md w-full relative">
        
        <div class="glass-ticket rounded-[3rem] overflow-hidden shadow-[0_0_60px_rgba(0,0,0,1)] border border-white/5">
            
            
            <div class="pt-12 pb-10 px-8 text-center border-b border-dashed border-white/20">
                <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-tr from-purple-600 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/40 rotate-3 group-hover:rotate-0 transition-transform">
                    <span class="text-5xl font-black text-white italic">{{ substr($invitado->nombre_apellidos, 0, 1) }}</span>
                </div>
                
                <h1 class="text-3xl font-black text-white uppercase tracking-tighter mb-2">
                    {{ $invitado->nombre_apellidos }}
                </h1>
                <p class="text-xs font-black text-purple-400 tracking-[0.4em] uppercase">Status: VIP ACCESS</p>
            </div>

            
            <div class="p-10 space-y-8 bg-white/[0.01]">
                
                <div class="flex flex-col gap-1">
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Email de Invitación</span>
                    <span class="text-white text-lg font-medium">{{ $invitado->email }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Bebida</span>
                        <span class="text-purple-400 text-xl font-black italic">{{ $invitado->bebida_alcoholica }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Mezcla</span>
                        <span class="text-pink-500 text-xl font-black italic">{{ $invitado->mezcla }}</span>
                    </div>
                </div>


        
        <div class="mt-8 flex flex-col sm:flex-row gap-4 px-2">
            <a href="{{route('cumples.index')}}" class="flex-1 bg-white/[0.05] hover:bg-white/[0.1] text-gray-400 hover:text-white text-center py-4 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] transition-all border border-white/10">
                ← Lista Completa
            </a>
            <a href="{{route('cumples.edit', $invitado)}}" class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center py-4 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] shadow-lg shadow-purple-900/20 transition-all hover:scale-105">
                Editar Pase
            </a>
        </div>
    </div>
</div>
@endsection