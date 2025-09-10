<?php

namespace App\Http\Controllers;

use App\Models\ine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ineController extends Controller
{
    public function showIne() {
        $data = [
            'registries' => ine::all(),
            'status' => 200
        ];
        $ine = ine::all();
        if ($data['registries']->isEmpty()) {
            $data['registries'] = 'No se encontraron registros';
        }
        return response()->json($data['registries'], $data['status']);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:50',
            'ap_paterno' => 'required|max:40',
            'ap_materno' => 'required|max:40',
            'sexo' => 'required|integer',
            'calle' => 'required|max:30',
            'interior' => 'required|max:10',
            'exterior' => 'required|max:10',
            'colonia' => 'required|max:30',
            'cp' => 'required|max:10',
            'municipio' => 'required|integer',
            'clave' => 'required|min:18|max:18',
            'curp' => 'required|min:18|max:18',
            'nacimiento' => 'required/date'
        ]);
        echo "Validador creado\n";
        if ($validator->fails()) {
            echo "Validando\n";
            $data = [
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        echo "Validado\n";
        $ine = ine::create([
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'sexo' => $request->sexo,
            'calle' => $request->calle,
            'interior' => $request->interior,
            'exterior' => $request->exterior,
            'colonia' => $request->colonia,
            'cp' => $request->cp,
            'municipio' => $request->municipio,
            'clave' => $request->clave,
            'curp' => $request->curp,
            'nacimiento' => $request->nacimiento
        ]);
        echo "proceso de creación\n";
        if (!$ine) {
            $data = [
                'message' => 'Error al registrar',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'ine' => $ine,
            'status' => 201
        ];
        return response()->json($data,201);
    }
}
