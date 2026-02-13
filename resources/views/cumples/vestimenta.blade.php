@extends('layouts.plantilla')

@section('title', 'VESTIMENTA - MACROFIESTA')

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

</style>

<div class="min-h-screen w-full animate-gradient flex flex-col items-center py-12 px-6">
    
    <div class="relative w-full max-w-4xl"> 
        <div class="absolute -top-12 -left-12 w-48 h-48 bg-blue-100 rounded-full mix-blend-multiply filter blur-[60px] opacity-60"></div>
        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-purple-100 rounded-full mix-blend-multiply filter blur-[60px] opacity-60"></div>

        <div class="space-y-8 text-slate-600 leading-relaxed text-center mb-12">
            <p class="text-2xl font-medium italic">Dress Code: <span class="text-purple-500 font-black">Sin Etiqueta</span></p>
        
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                <div class="bg-white/60 p-8 rounded-[2.5rem] border border-pink-100 shadow-sm flex flex-col justify-center items-center h-72 transform hover:scale-[1.02] transition-transform duration-300">
                    <p class="font-black text-pink-400 uppercase text-xs mb-4 tracking-[0.2em]">Chicas</p>
                    <p class="text-sm md:text-base px-4">El que está haciendo esto no sabe cómo quieren ir las mujeres, pero me dicen que no muy arregladas. </p>
                </div>
                
                <div class="bg-white/60 p-8 rounded-[2.5rem] border border-blue-100 shadow-sm flex flex-col justify-center items-center h-72 transform hover:scale-[1.02] transition-transform duration-300">
                    <p class="font-black text-blue-400 uppercase text-xs mb-4 tracking-[0.2em]">Chicos</p>
                    <p class="text-sm md:text-base px-4">Camisas, jerseys y pantalones chinos o de traje.<br>¡Botitas para pachanga opcionales!⚽<br> Quien se quiera traer esférico está en todo su derecho como invitado</span></p>
                </div>
            </div>
        </div>

        <div class="relative glass-light rounded-[3rem] shadow-xl overflow-hidden p-8 md:p-12">
            
            <div class="text-center mb-10">
                <span class="inline-block px-4 py-1 rounded-full bg-indigo-50 text-indigo-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 border border-indigo-100">
                    Información Detallada
                </span>
                <h1 class="text-4xl font-black text-slate-800 italic uppercase tracking-tighter">
                    Aquí tenéis ejemplos ❤️
                </h1>
                <div class="h-1 w-20 bg-gradient-to-r from-indigo-400 to-purple-400 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="flex flex-col items-center">
                        <div class="w-full h-72 rounded-[2rem] overflow-hidden border-4 border-white shadow-md bg-white/50 transform rotate-[-2deg] hover:rotate-0 transition-all duration-300">
                            <img src="{{ asset('img/foto1.jpg') }}" class="w-full h-full object-cover" alt="1">
                        </div>
                        <span class="mt-3 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">TRANCHETE</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-full h-72 rounded-[2rem] overflow-hidden border-4 border-white shadow-md bg-white/50 transform rotate-[2deg] hover:rotate-0 transition-all duration-300">
                            <img src="{{ asset('img/foto2.jpg') }}" class="w-full h-full object-cover" alt="2">
                        </div>
                        <span class="mt-3 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">TATONA</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-full h-72 rounded-[2rem] overflow-hidden border-4 border-white shadow-md bg-white/50 transform rotate-[-1deg] hover:rotate-0 transition-all duration-300">
                            <img src="{{ asset('img/foto3.jpeg') }}" class="w-full h-full object-cover" alt="3">
                        </div>
                        <span class="mt-3 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">MACUCONA</span>
                    </div>
                </div>
            </div>
            <div class="mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="flex flex-col items-center">
                        <div class="w-full h-72 rounded-[2rem] overflow-hidden border-4 border-white shadow-md bg-white/50 transform rotate-[-2deg] hover:rotate-0 transition-all duration-300">
                            <img src="{{ asset('img/foto4.jpeg') }}" class="w-full h-full object-cover" alt="1">
                        </div>
                        <span class="mt-3 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">LLORONA</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-full h-72 rounded-[2rem] overflow-hidden border-4 border-white shadow-md bg-white/50 transform rotate-[2deg] hover:rotate-0 transition-all duration-300">
                            <img src="{{ asset('img/foto5.jpeg') }}" class="w-full h-full object-cover" alt="2">
                        </div>
                        <span class="mt-3 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">SONRIENTE</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-full h-72 rounded-[2rem] overflow-hidden border-4 border-white shadow-md bg-white/50 transform rotate-[-1deg] hover:rotate-0 transition-all duration-300">
                            <img src="{{ asset('img/foto6.jpeg') }}" class="w-full h-full object-cover" alt="3">
                        </div>
                        <span class="mt-3 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">ATERRADORA</span>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center border-t border-slate-100 pt-8">
                <a href="{{ route('cumples.create') }}" class="inline-block px-8 py-3 bg-slate-800 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-indigo-500 transition-colors duration-300 shadow-md">
                    ← Volver al Registro
                </a>
            </div>
        </div>
<br><br>
        <div class="pb-12 text-center">
            <p class="text-[15px] font-mono text-gray-600">
                Developed by @antoniobarbado_, @barbadodev on GitHub
            </p>
        </div>
    </div>
</div>
@endsection