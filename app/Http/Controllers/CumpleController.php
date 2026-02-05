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
        $cumple = new Cumple();
        $cumple->nombre_apellidos = $request->nombre_apellidos;
        $cumple->email = $request->email;
        $cumple->bebida_alcoholica = $request->bebida;
        $cumple->mezcla = $request->mezcla;

        /*random key secreta*/ 
        $cumple->token = Str::random(10);

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

    public function edit(Cumple $cumple) 
{
    
    $invitado = $cumple; 
    
    return view('cumples.edit', compact('invitado'));
}

public function update(Request $request, Cumple $cumple)
{
    
    $cumple->nombre_apellidos = $request->nombre_apellidos;
    $cumple->email = $request->email;
    $cumple->bebida_alcoholica = $request->bebida_alcoholica;
    $cumple->mezcla = $request->mezcla;

    $cumple->save();
    
    
    return redirect()->route('cumples.show', $cumple);
}
}