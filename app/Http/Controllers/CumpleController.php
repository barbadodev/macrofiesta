<?php

namespace App\Http\Controllers;

use App\Models\Cumple;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CumpleController extends Controller
{
    public function create(){
        return view('cumples.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre_apellidos' => 'required|min:3',
            'tinto'     => 'required_without_all:cerveza,refrescos,copas',
            'cerveza'   => 'required_without_all:tinto,refrescos,copas',
            'refrescos' => 'required_without_all:tinto,cerveza,copas',
            'copas'     => 'required_without_all:tinto,cerveza,refrescos',
            
            'copas'     => 'required_if:copas,si',
            'mezcla'    => 'required_if:copas,si',
        ], [
            'nombre_apellidos.required' => '¡La tranchete necesita tu nombre!',
            'tinto.required_without_all' => 'Debes elegir al menos una opción.',
        ]);

        $cumple = new Cumple();
        $cumple->nombre_apellidos = $request->nombre_apellidos;
        
        $nombreLimpio = str_replace(' ', '', $request->nombre_apellidos);
        $cumple->email = strtolower($nombreLimpio) . rand(10, 999) . "@macrofiesta.com";

        
        $cumple->tinto     = $request->has('tinto') ? 'si' : '';
        $cumple->cerveza   = $request->has('cerveza') ? 'si' : '';
        $cumple->refrescos = $request->has('refrescos') ? 'si' : '';
        
        
        
        $cumple->copas     = $request->has('copas') ? ($request->input('copas') ?? '') : '';
        $cumple->mezcla    = $request->has('copas') ? ($request->input('mezcla') ?? '') : '';

        $cumple->observaciones = $request->observaciones ?? '';
        
        $cumple->token = Str::random(10);
        $cumple->save();

        return redirect()->route('cumples.show', $cumple);
    }

    public function update(Request $request, Cumple $cumple) {
        $cumple->nombre_apellidos = $request->nombre_apellidos;
        
        $cumple->tinto     = $request->has('tinto') ? 'si' : '';
        $cumple->cerveza   = $request->has('cerveza') ? 'si' : '';
        $cumple->refrescos = $request->has('refrescos') ? 'si' : '';
        
        $cumple->copas     = $request->has('copas') ? ($request->input('copas') ?? '') : '';
        $cumple->mezcla    = $request->has('copas') ? ($request->input('mezcla') ?? '') : '';
        
        $cumple->observaciones = $request->observaciones ?? '';
        
        $cumple->save();
        return redirect()->route('cumples.show', $cumple);
    }
    
    public function index(){
        if (!Session::get('admin_access')){
            return redirect()->route('cumples.admin.login');
        }
        $invitados = Cumple::orderBy('id', 'desc')->paginate();
        return view('cumples.index', compact('invitados'));
    }

    public function show(Cumple $cumple){
        $invitado = $cumple;
        return view('cumples.show', compact('invitado'));
    }

    public function edit(Cumple $cumple) {
        $invitado = $cumple; 
        return view('cumples.edit', compact('invitado'));
    }

    public function sitio() { return view('cumples.sitio'); }
    public function vestimenta() { return view('cumples.vestimenta'); }
}