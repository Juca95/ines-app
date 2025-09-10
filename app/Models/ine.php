<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ine extends Model
{
    protected $table = 'ine';
    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'sexo',
        'calle',
        'interior',
        'exterior',
        'colonia',
        'cp',
        'municipio',
        'clave',
        'curp',
        'nacimiento'
    ];
}
