<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departamento;
use App\Municipio;
use App\TipoIdentificacion;

class Paciente extends Model
{

	public static $messages = [
        'numeroidentificacion.required' => 'El numero de identificacion es un campo obligatorio',
        'numeroidentificacion.max' => 'El numero de identificacion debe tener maximo 25 caracteres',
        'numeroidentificacion.unique' => 'El numero de identificacion que ingresaste ya existe',
        'tipo_documento_id.required' => 'El tipo de documento es un campo obligatorio',
        'nombre1.required' => 'El nombre1 es un campo obligatorio',
        'nombre2.required' => 'El nombre2 es un campo obligatorio',
        'apellido1.required' => 'El apellido1 es un campo obligatorio',
        'apellido2.required' => 'El apellido2 es un campo obligatorio',
        'genero.required' => 'El genero es un campo obligatorio',
        'departamento_id.required' => 'El Departamento es un campo obligatorio',
        'municipio_id.required' => 'El Municipio es un campo obligatorio',
    ];

    public static $rules = [
    		'tipo_documento_id' => 'required',
            'numeroidentificacion' => 'required|max:20|unique:pacientes,numeroidentificacion',
            'nombre1' => 'required',
            'nombre2' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'genero' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required'
    ];
    //
	public function departamento() {
        return $departamento = Departamento::where('id',$this->iddepartamento) -> first();
    }

    public function municipio() {
        return $municipio = Municipio::where('id',$this->idmunicipio) -> first();
    }

    public function tipoidentificacion() {
        return $tipoidentificacion = TipoIdentificacion::where('id',$this->tipoidentificacion) -> first();
    }

}
