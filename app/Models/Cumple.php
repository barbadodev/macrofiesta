<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cumple extends Model
{
    use HasFactory;

    protected $table = 'tabla_cumpleanos';
    protected $fillable = [
        'nombre_apellidos',
        'email',
        'bebida_alcoholica',
        'mezcla'
    ];

    
public function getRouteKeyName()
{
    return 'token';
}
}
