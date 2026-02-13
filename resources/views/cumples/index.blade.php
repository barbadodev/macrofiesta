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
        background-color: rgb(114, 39, 65);
        background-image: 
            radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
            radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
            radial-gradient(at 100% 0%, rgb(114, 39, 65) 0, transparent 50%);
    }

    .custom-scrollbar::-webkit-scrollbar { height: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(168, 85, 247, 0.4); border-radius: 10px; }
    
</style>

<div class="min-h-screen bg-party py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-purple-500 font-black tracking-[0.3em] uppercase text-xs">Access Control</span>
                <h1 class="text-6xl font-black text-white italic tracking-tighter mt-2">
                    ADMIN <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">DASHBOARD</span>
                </h1>
            </div>
            
            <a href="{{route('cumples.create')}}" 
               class="group relative inline-flex items-center justify-center px-8 py-4 text-white transition-all duration-200 bg-transparent border-2 border-white rounded-full hover:bg-white hover:text-black">
               <svg class="w-5 h-5 ml-2 transition-transform group-hover:rotate-" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </a>
        </div>

        <div class="glass-card rounded-[2.5rem] overflow-hidden shadow-2xl">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/5">
                            <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Invitado</th>
                            <th class="px-6 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Bebida</th>
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
                                        #{{ $invitado->id }}
                                    </div>
                                    <div>
                                        <span class="font-bold text-white block"> {{ $invitado->nombre_apellidos }} </span>
                                        
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-6 text-center">
                                <div class="flex justify-center gap-3">
                                    @if($invitado->tinto == 'si') <span class="text-xl" title="Vino Tinto">🍷</span> @endif
                                    @if($invitado->cerveza == 'si') <span class="text-xl" title="Cerveza">🍺</span> @endif
                                    @if($invitado->refrescos == 'si') <span class="text-xl" title="Refrescos">🥤</span> @endif
                                    @if($invitado->tinto != 'si' && $invitado->cerveza != 'si' && $invitado->refrescos != 'si') <span class="text-xs font-black text-pink-500 tracking-wider">X</span> @endif
                                </div>
                            </td>

                            <td class="px-8 py-6">
                                @if($invitado->copas && $invitado->copas != '' && $invitado->copas != 'no')
                                    <div class="flex flex-col">
                                        <span class="text-xs font-black text-white uppercase tracking-wider">
                                            {{ $invitado->copas }}
                                        </span>
                                        <span class="text-xs font-black text-white uppercase tracking-wider">
                                            + {{ $invitado->mezcla ?? 'Sola' }}
                                        </span>
                                    </div>
                                @else
                                    <span class="text-xs font-black text-pink-500 tracking-wider">X</span>
                                @endif
                            </td>

                            <td class="px-8 py-6">
                                @if($invitado->observaciones)
                                    <div class="">
                                        <p class="text-xs font-black text-white tracking-wider">
                                            "{{ $invitado->observaciones }}"
                                        </p>
                                    </div>
                                @else
                                    <span class="text-xs font-black text-pink-500 tracking-wider">Sin notas</span>
                                @endif
                            </td>

                            <td class="px-8 py-6 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{route('cumples.show', $invitado)}}" 
                                        class="p-2 text-pink-400/70 hover:text-white transition-colors" title="Ver">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <a href="{{route('cumples.edit', $invitado)}}" 
                                        class="p-2 text-purple-400/70 hover:text-white transition-colors" title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center text">
                                <p class="text-purple-400 text-2xl font-black italic uppercase tracking-widest opacity-20">Lista Vacía</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-12 p-4">
            {{ $invitados->links() }}
        </div>

        <div class="mt-12 text-center space-y-4">
            <p class="text-[14px] font-mono text-black-600 italic">
                Developed by <span class="text-purple-400">@antoniobarbado_ | @barbadodev on GitHub</span>
            </p>
            <a href="{{ route('cumples.admin.logout') }}" 
                class="inline-block text-[11px] font-black text-red-500/60 hover:text-red-500 uppercase tracking-widest border border-red-500/20 px-4 py-2 rounded-lg transition-all">
                Cerrar Sesión Admin
            </a>
        </div>
    </div>
</div>
@endsection