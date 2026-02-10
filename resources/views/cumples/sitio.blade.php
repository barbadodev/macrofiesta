@extends('layouts.plantilla')

@section('title', 'UBICACIÓN - MACROFIESTA')

@section('content')
<style>
    body {
        margin: 0;
        background-color: #f0f4f8;
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
    }

    .glass-light {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
</style>

<div class="min-h-screen w-full animate-gradient flex flex-col items-center py-12 px-6">
    
    <div class="relative w-full max-w-2xl">
        
        <div class="absolute -top-12 -left-12 w-48 h-48 bg-blue-100 rounded-full mix-blend-multiply filter blur-[60px] opacity-60"></div>
        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-purple-100 rounded-full mix-blend-multiply filter blur-[60px] opacity-60"></div>

        <div class="relative glass-light rounded-[3rem] shadow-xl overflow-hidden p-8 md:p-12">
            
            <div class="text-center mb-10">
                <span class="inline-block px-4 py-1 rounded-full bg-indigo-50 text-indigo-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 border border-indigo-100">
                    ¿Cómo llegar?
                </span>
                <h1 class="text-4xl font-black text-slate-800 italic uppercase tracking-tighter leading-none">
                    UBICACIÓN
                </h1>
                <p class="text-indigo-500 font-bold mt-4 text-sm tracking-wide">📍 Finca El Carrascal</p>
                <p class="text-slate-400 text-[10px] uppercase tracking-widest mt-1">Ctra. Palma del Río, km 4, Córdoba</p>
            </div>

            <div class="space-y-6">
                <div class="rounded-[2.5rem] overflow-hidden shadow-inner border-4 border-white h-80 bg-slate-100">
                    <iframe 
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d684.9953414089601!2d-4.82871999625623!3d37.88039998850999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6cd931aceda6bd%3A0xdf26ca1107e635bf!2sFinca%20de%20celebraciones%20El%20Carrascal!5e1!3m2!1ses!2ses!4v1770719456190!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </iframe>
                </div>

                <div class="bg-white/50 p-6 rounded-3xl border border-white/60">
                    <h3 class="font-bold text-indigo-400 mb-2 uppercase text-xs tracking-widest text-center">Nota para los invitados:</h3>
                    <p class="text-sm italic text-slate-600 text-center">
                        "La hora de llegada debe ser sobre las 13:30, para que empiece este día inolvidable"
                    </p>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('cumples.create') }}" class="inline-block px-8 py-3 bg-slate-800 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-indigo-500 transition-colors duration-300 shadow-md">
                    ← Volver al Registro
                </a>
            </div>

        </div>

        <div class="mt-8 text-center">
            <p class="text-[11px] font-mono text-gray-400">
                Developed by <span class="text-indigo-400">@antoniobarbado_</span>
            </p>
        </div>
    </div>
</div>
@endsection