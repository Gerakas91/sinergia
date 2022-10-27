<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;

class MunicipioController extends Controller
{
    //
    public function search($id) {
    	$municipios = Municipio::where('iddepa',$id)->get();
    	$response = array(
            'status' => 'success',
            'carga' => json_encode($municipios),
            'msg' => 'datos cargados',
        );
        return response()->json($response);
    }
}
