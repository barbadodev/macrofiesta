@extends('layouts.plantilla')

@section('title', 'REGISTRO-MACROFIESTA')

@section('content')
<style>
    /* Eliminamos el bloqueo de scroll del body para que sea natural */
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
</style>

<div class="min-h-screen w-full animate-gradient flex flex-col items-center py-12 px-6">
    
    <div class="w-full max-w-4xl mb-16">
        <div class="flex flex-wrap justify-center gap-10">
            
            <div class="flex flex-col items-center gap-4">
                <a href="{{ route('cumples.sitio') }}" class="group relative h-72 w-full md:w-80 rounded-[2.5rem] bg-white/40 border border-white shadow-sm overflow-hidden transform hover:scale-[1.05] transition-all duration-500">
                    <img src="{{ asset('img/18.jpg') }}" class="w-full h-full object-cover" alt="SITIO">
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors"></div>
                </a>
                <div class="flex flex-col items-center animate-bounce opacity-60">
                    <span class="text-indigo-400 text-xs">▲</span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">SITIO</span>
                </div>
            </div>

            <div class="flex flex-col items-center gap-4">
                <a href="{{ route('cumples.vestimenta') }}" class="group relative h-72 w-full md:w-80 rounded-[2.5rem] bg-white/40 border border-white shadow-sm overflow-hidden transform hover:scale-[1.05] transition-all duration-500">
                    <img src="{{ asset('img/vestimenta.jpg')}}" class="w-full h-full object-cover" alt="VESTIMENTA">
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors"></div>
                </a>
                <div class="flex flex-col items-center animate-bounce opacity-60">
                    <span class="text-purple-400 text-xs">▲</span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">VESTIMENTA</span>
                </div>
            </div>

        </div>
    </div>

    <div class="relative w-full max-w-md pb-12">
        
        <div class="absolute -top-12 -left-12 w-48 h-48 bg-purple-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50"></div>
        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-pink-200 rounded-full mix-blend-multiply filter blur-[60px] opacity-50"></div>

        <div class="relative glass-light rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.03)] overflow-hidden">
            
            <div class="pt-12 pb-8 px-10 text-center">
                <span class="inline-block px-4 py-1 rounded-full bg-purple-500/10 text-purple-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 border border-purple-500/20">
                    Sábado 11 de Abril
                </span>
                <h1 class="text-5xl font-black text-slate-800 italic tracking-tighter uppercase leading-none">
                    MACRO<span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">FIESTA</span>
                </h1>
                <p class="text-gray-400 mt-4 font-bold tracking-[0.4em] text-[10px] uppercase opacity-60">FIESTA 18 TATONA</p>
                                <div class="flex justify-center gap-4 mt-6 mb-2" id="countdown">
                    <div class="flex flex-col items-center">
                        <span id="days" class="text-2xl font-black text-purple-500 italic leading-none">00</span>
                        <span class="text-[8px] font-black uppercase tracking-widest text-slate-400 mt-1">Días</span>
                    </div>
                    <span class="text-2xl font-black text-slate-300">:</span>
                    <div class="flex flex-col items-center">
                        <span id="hours" class="text-2xl font-black text-purple-500 italic leading-none">00</span>
                        <span class="text-[8px] font-black uppercase tracking-widest text-slate-400 mt-1">Hrs</span>
                    </div>
                    <span class="text-2xl font-black text-slate-300">:</span>
                    <div class="flex flex-col items-center">
                        <span id="minutes" class="text-2xl font-black text-purple-500 italic leading-none">00</span>
                        <span class="text-[8px] font-black uppercase tracking-widest text-slate-400 mt-1">Min</span>
                    </div>
                    <span class="text-2xl font-black text-slate-300">:</span>
                    <div class="flex flex-col items-center">
                        <span id="seconds" class="text-2xl font-black text-pink-400 italic leading-none">00</span>
                        <span class="text-[8px] font-black uppercase tracking-widest text-slate-400 mt-1">Seg</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('cumples.store') }}" method="POST" class="p-10 pt-0 space-y-8">
                @csrf

                <div class="group relative">
                    <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Nombre y Apellidos</label>
                    <input type="text" name="nombre_apellidos" required
                        class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300"
                        placeholder="Nombre completo">
                </div>

                <div class="group relative">
                    <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Email</label>
                    <input type="email" name="email" required
                        class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300"
                        placeholder="Te enviaremos la cuenta atrás">
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div class="group relative">
                        <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Bebida</label>
                        <input type="text" name="bebida"
                            class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300"
                            placeholder="¿Qué tomas?">
                    </div>
                    
                    <div class="group relative">
                        <label class="text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] ml-1 opacity-70 group-focus-within:opacity-100 transition-all">Mezcla</label>
                        <input type="text" name="mezcla"
                            class="w-full bg-transparent border-0 border-b border-slate-200 px-0 py-3 text-lg text-slate-700 focus:ring-0 focus:border-purple-400 transition-all placeholder:text-slate-300"
                            placeholder="¿Con qué?">
                    </div>
                </div>

                <div class="mt-4 p-6 bg-[#1DB954]/5 rounded-[2.5rem] border border-[#1DB954]/10 text-center shadow-inner">
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <div class="w-8 h-8 bg-[#1DB954] rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.5 17.5c-.2.3-.6.4-.9.2-2.5-1.5-5.6-1.9-9.3-1-.3.1-.7-.1-.8-.4s.1-.7.4-.8c4.1-1 7.6-.5 10.4 1.2.3.2.4.5.2.8zm1.5-3.3c-.3.4-.8.5-1.2.2-2.8-1.7-7.1-2.2-10.5-1.2-.5.1-1-.2-1.1-.7s.2-1 .7-1.1c4-1.2 8.7-.6 11.9 1.4.4.3.5.9.2 1.4zm.1-3.4C15.2 8.4 8.7 8.2 5 9.3c-.6.2-1.2-.2-1.4-.7-.2-.6.2-1.2.7-1.4 4.3-1.3 11.5-1.1 16.1 1.6.5.3.7 1 .4 1.5-.3.5-.9.7-1.7.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-[10px] font-black text-[#1DB954] uppercase tracking-[0.3em]">Playlist de la Fiesta</h3>
                    </div>
                    <a href="https://open.spotify.com/playlist/7otgUClhjrJ2QGWCH8ckKy?si=372994b4b9e547ca&pt=ae463f26fee7ac2d9e07f14f48ff73b7" 
                       target="_blank" 
                       class="inline-block px-6 py-2.5 bg-white border border-[#1DB954]/30 text-[#1DB954] text-[9px] font-black uppercase tracking-[0.2em] rounded-full hover:bg-[#1DB954] hover:text-white transition-all duration-300 shadow-sm active:scale-95">
                        + AÑADIR CANCIONES A LA PLAYLIST
                    </a>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                        class="group relative w-full h-16 bg-slate-800 rounded-2xl overflow-hidden transition-all duration-500 hover:scale-[1.02] active:scale-95 shadow-md">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <span class="relative text-white font-black text-xs tracking-[0.4em] uppercase transition-colors duration-500">
                            REGISTRAR ACCESO A LA FIESTA
                        </span>
                    </button>
                </div>
            </form>

            <div class="bg-white/40 py-8 text-center border-t border-slate-100">
                <a href="{{ route('cumples.index') }}" class="text-[9px] font-black text-gray-400 hover:text-purple-500 uppercase tracking-[0.4em] transition-all duration-300">
                    ← Ver lista de invitados
                </a>
          
                <div class="pt-8 text-center border-t border-slate-100 mt-6">
                    <p class="text-[11px] font-mono text-gray-600">
                        Developed by <span class="text-purple-400">@antoniobarbado_, @barbadodev in GitHub</span>
                    </p>
                </div>
            </div> 
        </div> 
    </div> 
</div> 

<script>
    const countdown = () => {
        
        const countDate = new Date("April 11, 2026 13:00:00").getTime();
        const now = new Date().getTime();
        const gap = countDate - now;

        
        const second = 1000;
        const minute = second * 60;
        const hour = minute * 60;
        const day = hour * 24;

       
        const d = Math.floor(gap / day);
        const h = Math.floor((gap % day) / hour);
        const m = Math.floor((gap % hour) / minute);
        const s = Math.floor((gap % minute) / second);

        
        document.getElementById("days").innerText = d < 10 ? "0" + d : d;
        document.getElementById("hours").innerText = h < 10 ? "0" + h : h;
        document.getElementById("minutes").innerText = m < 10 ? "0" + m : m;
        document.getElementById("seconds").innerText = s < 10 ? "0" + s : s;

        
        if (gap < 0) {
            document.getElementById("countdown").innerHTML = "<span class='text-purple-500 font-black tracking-widest italic'>¡ES HOY! 🥳</span>";
        }
    };

    // Actualizar cada segundo
    setInterval(countdown, 1000);
    countdown(); // Ejecutar al cargar
</script>

@endsection