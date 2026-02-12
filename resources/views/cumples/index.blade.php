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

    /* Tu scrollbar para la tabla */
    .custom-scrollbar::-webkit-scrollbar { height: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(168, 85, 247, 0.4); border-radius: 10px; }
</style>

<div class="min-h-screen bg-party py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-purple-500 font-black tracking-[0.3em] uppercase text-xs">Access Control</span>
                <h1 class="text-6xl font-black text-white italic tracking-tighter mt-2">
                    ADMIN <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">DASHBOARD</span>
                </h1>
            </div>
            
            <a href="{{route('cumples.create')}}" 
               class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 bg-transparent border-2 border-white rounded-full hover:bg-white hover:text-black">
               <span class="relative"></span>
               <svg class="w-5 h-5 ml-2 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </a>
        </div>

        <div class="glass-card rounded-[2.5rem] overflow-hidden">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/5">
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Invitado</th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Bebida</th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Copa</th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Notas</th>
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Gestión</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($invitados as $invitado)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center font-black text-white text-xs">
                                        {{ substr($invitado->nombre_apellidos, 0, 1) }}
                                    </div>
                                    <span class="font-bold text-white tracking-tight">{{ $invitado->nombre_apellidos }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex gap-2">
                                    @if($invitado->tinto == 'si') <span title="Vino Tinto">🍷</span> @endif
                                    @if($invitado->cerveza == 'si') <span title="Cerveza">🍺</span> @endif
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-xs font-bold text-gray-300">{{ $invitado->bebida_alcoholica }}</p>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">con {{ $invitado->mezcla }}</p>
                            </td>
                            <td class="px-8 py-6">
                                @if($invitado->observaciones)
                                    <div class="group relative flex justify-start">
                                        <span class="cursor-help opacity-50 hover:opacity-100 transition-opacity">📝</span>
                                        <div class="absolute bottom-full left-0 mb-2 hidden group-hover:block w-48 p-2 bg-slate-800 text-white text-[10px] rounded-lg shadow-xl z-50">
                                            {{ $invitado->observaciones }}
                                        </div>
                                    </div>
                                @else
                                    <span class="opacity-10 text-white">-</span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{route('cumples.show', $invitado)}}" 
                                       class="px-3 py-1.5 text-[10px] font-black uppercase tracking-widest text-pink-400/70 border border-pink-500/20 rounded-xl hover:bg-pink-500 hover:text-white hover:shadow-[0_0_15px_rgba(236,72,153,0.5)] transition-all duration-300">
                                        Show
                                    </a>

                                    <a href="{{route('cumples.edit', $invitado)}}" 
                                       class="px-3 py-1.5 text-[10px] font-black uppercase tracking-widest text-pink-400/70 border border-pink-500/20 rounded-xl hover:bg-pink-500 hover:text-white hover:shadow-[0_0_15px_rgba(236,72,153,0.5)] transition-all duration-300">
                                        Edit
                                    </a>

                                    <form action="{{ route('cumples.index', $invitado) }}" method="POST" class="inline">
                                        @csrf @method('delete')
                                        <button type="submit" onclick="return confirm('¿Borrar invitado?')"
                                            class="px-3 py-1.5 text-[10px] font-black uppercase tracking-widest text-red-500/40 border border-red-500/10 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300">
                                            Del
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <p class="text-white text-2xl font-black italic uppercase tracking-widest">Lista Vacía</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-12 p-4 rounded-2xl bg-white/5 border border-white/5 backdrop-blur-sm">
            {{ $invitados->links() }}
        </div>

        <div class="mt-12 text-center space-y-4">
            <p class="text-[18px] font-mono text-gray-500">
                Developed by <span class="text-white border-b border-purple-500">@antoniobarbado_ @barbadodev in GitHub</span>
            </p>
            <a href="{{ route('cumples.admin.logout') }}" 
               class="inline-block text-[13px] font-black text-red-500/40 hover:text-red-500">
                Cerrar Sesión Admin
            </a>
        </div>
    </div>
</div>
@endsection