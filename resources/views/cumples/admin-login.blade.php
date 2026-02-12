@extends('layouts.plantilla')

@section('content')
<div class="min-h-screen bg-black flex items-center justify-center p-6">
    <div class="max-w-md w-full glass-dark p-10 rounded-[2.5rem] text-center border border-white/10">
        <h1 class="text-3xl font-black text-white italic mb-6 uppercase tracking-tighter">ÁREA RESTRINGIDA</h1>
        <p class="text-gray-500 mb-8 text-xs font-bold tracking-widest uppercase">Solo Staff de la Macrofiesta</p>
        
        <form action="{{ route('cumples.admin.auth') }}" method="POST" class="space-y-6">
            @csrf
            <input type="password" name="password" autofocus
                class="w-full bg-white/5 border-b-2 border-purple-500 py-3 text-center text-white text-2xl focus:ring-0 outline-none rounded-xl"
                placeholder="••••••••">
            
            <button type="submit" class="w-full bg-white text-black font-black py-4 rounded-2xl hover:bg-purple-500 hover:text-white transition-all uppercase tracking-[0.3em] text-xs">
                Acceder a la Lista
            </button>
        </form>
        <a href="{{route('cumples.create')}}" 
                        class="text-[9px] font-black text-gray-400 hover:text-purple-500 text-center uppercase tracking-[0.4em] transition-all duration-300">
                        ← Volver a el registro
        </a>
    </div>
</div>
@endsection