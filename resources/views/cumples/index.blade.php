@extends('layouts.plantilla')

@section('title','ADMIN-LIST')

@section('content')
<style>
    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    .animate-float { animation: floating 3s ease-in-out infinite; }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .bg-party {
        background-color: #050505;
        background-image: 
            radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
            radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
            radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
    }
</style>

<div class="min-h-screen bg-party py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        
        {{-- Header Brutalista --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-purple-500 font-black tracking-[0.3em] uppercase text-xs">Access Control</span>
                <h1 class="text-6xl font-black text-white italic tracking-tighter mt-2">
                    LA <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">LISTA DE INVITADOS</span>
                </h1>
            </div>
            
            <a href="{{route('cumples.create')}}" 
               class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 bg-transparent border-2 border-white rounded-full hover:bg-white hover:text-black">
               <span class="relative">AÑADIR NUEVO</span>
               <svg class="w-5 h-5 ml-2 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </a>
        </div>

        {{-- Grid de Invitados (Tarjetas en vez de lista) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($invitados as $invitado)
                <div class="glass-card rounded-[2rem] p-6 hover:border-purple-500/50 transition-all duration-500 group relative overflow-hidden">
                    {{-- Decoración interna --}}
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-600/10 rounded-full blur-2xl group-hover:bg-purple-600/30 transition-all"></div>
                    
                    <div class="relative flex flex-col items-center text-center">
                        {{-- Avatar con Neón --}}
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-gray-800 to-black flex items-center justify-center border border-white/10 mb-4 group-hover:scale-110 transition-transform shadow-2xl">
                            <span class="text-3xl font-black text-white group-hover:text-purple-400">
                                {{ substr($invitado->nombre_apellidos, 0, 1) }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-1 tracking-tight">{{$invitado->nombre_apellidos}}</h3>
                        <p class="text-gray-500 text-sm mb-6 uppercase tracking-widest font-bold">Invitado/a</p>

                        <a href="{{route('cumples.show', $invitado)}}" 
                           class="w-full py-3 bg-white/5 group-hover:bg-purple-600 rounded-xl text-white font-bold text-xs tracking-widest transition-all">
                           VER CREDENCIALES
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full glass-card rounded-[2rem] py-20 text-center">
                    <div class="animate-float text-6xl mb-6">🎫</div>
                    <p class="text-white text-2xl font-black italic">SOLO PERSONAL AUTORIZADO</p>
                    <p class="text-gray-500 mt-2">No hay nadie en la lista todavía.</p>
                </div>
            @endforelse
        </div>

        {{-- Paginación --}}
        <div class="mt-12 p-4 rounded-2xl bg-white/5 border border-white/5 backdrop-blur-sm">
            {{ $invitados->links() }}

            
        </div>
        <div class="mt-12 text-center space-y-4">
    {{-- Tu firma --}}
    <p class="text-[18px] font-mono text-gray-500">
        Hecho por <span class="text-white border-b border-purple-500">@antoniobarbado_ @barbadodev in GitHub</span>
    </p>

    {{-- Botón de cerrar sesión que ya teníamos --}}
    <a href="{{ route('cumples.admin.logout') }}" 
       class="inline-block text-[13px] font-black text-red-500/40 hover:text-red-500">
       🔒 Cerrar Sesión Admin
    </a>
</div>
    </div>
    
</div>

@endsection