<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Departamento;
use App\Municipio;
use App\TipoIdentificacion;

class PacienteController extends Controller
{
    //
    public function index() {
        $pacientes = Paciente::orderBy('apellido1') -> get();
        return view('paciente.index')->with(compact('pacientes')); //listado de tipos movimientos
    }
    //
    public function create() {
        $departamentos = Departamento::orderBy('nombdepa') -> get();
        $municipios = Municipio::orderBy('nombmuni') -> get();
        $tiposDocumento = TipoIdentificacion::orderBy('name') -> get();
        return view('paciente.register')->with( compact('tiposDocumento','departamentos','municipios') );
    }

    public function store( Request $request ) {
        if( $request->input('tipo_documento_id') == 'I' ) {
            $request['tipo_documento_id'] = null;
        }
        if( $request->input('genero') == 'I' ) {
            $request['genero'] = null;
        }
        if( $request->input('departamento_id') == 'I' ) {
            $request['departamento_id'] = null;
        }
        if( $request->input('municipio_id') == 'I' ) {
            $request['municipio_id'] = null;
        }
        $messages = [
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
    	$rules = [
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
        $this->validate($request,$rules,$messages);
        //crear un cliente nuevo
        $paciente = new Paciente();
        $paciente -> tipoidentificacion = $request->input('tipo_documento_id');
        //$product -> description = $request->input('description');
        $paciente -> numeroidentificacion = $request->input('numeroidentificacion');
        $paciente -> nombre1 = $request->input('nombre1');
        $paciente -> nombre2 = $request->input('nombre2');
        $paciente -> apellido1 = $request->input('apellido1');
        $paciente -> apellido2 = $request->input('apellido2');
        $paciente -> genero = $request->input('genero');
        $paciente -> iddepartamento = $request->input('departamento_id');
        $paciente -> idmunicipio = $request->input('municipio_id');
        $paciente -> save(); //registrar producto
        $notification = 'Paciente Registrado Exitosamente';
        return redirect('/paciente') -> with( compact( 'notification' ) );
    }

    public function show( $id ) {
        $paciente = Paciente::find( $id );
        return view('paciente.show')->with(compact('paciente'));
    }

    public function edit( $id ) {
        $departamentos = Departamento::orderBy('nombdepa') -> get();
        $municipios = Municipio::orderBy('nombmuni') -> get();
        $tiposDocumento = TipoIdentificacion::orderBy('name') -> get();
        $paciente = Paciente::find( $id );
        return view('paciente.edit')->with(compact('paciente','tiposDocumento','departamentos','municipios')); //formulario de registro
    }

    public function update( Request $request , $id ) {
    	if( $request->input('tipo_documento_id') == 'I' ) {
            $request['tipo_documento_id'] = null;
        }
        if( $request->input('genero') == 'I' ) {
            $request['genero'] = null;
        }
        if( $request->input('departamento_id') == 'I' ) {
            $request['departamento_id'] = null;
        }
        if( $request->input('municipio_id') == 'I' ) {
            $request['municipio_id'] = null;
        }
        $messages = [
	        'tipo_documento_id.required' => 'El tipo de documento es un campo obligatorio',
	        'nombre1.required' => 'El nombre1 es un campo obligatorio',
	        'nombre2.required' => 'El nombre2 es un campo obligatorio',
	        'apellido1.required' => 'El apellido1 es un campo obligatorio',
	        'apellido2.required' => 'El apellido2 es un campo obligatorio',
	        'genero.required' => 'El genero es un campo obligatorio',
	        'departamento_id.required' => 'El Departamento es un campo obligatorio',
	        'municipio_id.required' => 'El Municipio es un campo obligatorio',
    	];
    	$rules = [
    		'tipo_documento_id' => 'required',
            'nombre1' => 'required',
            'nombre2' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'genero' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required'
    	];
        $this->validate($request,$rules,$messages);
        //crear un prodcuto nuevo
        $paciente = Paciente::find( $id );
        $paciente -> tipoidentificacion = $request->input('tipo_documento_id');
        //$product -> description = $request->input('description');
        $paciente -> numeroidentificacion = $paciente -> numeroidentificacion;
        $paciente -> nombre1 = $request->input('nombre1');
        $paciente -> nombre2 = $request->input('nombre2');
        $paciente -> apellido1 = $request->input('apellido1');
        $paciente -> apellido2 = $request->input('apellido2');
        $paciente -> genero = $request->input('genero');
        $paciente -> iddepartamento = $request->input('departamento_id');
        $paciente -> idmunicipio = $request->input('municipio_id');
        $paciente -> save(); //registrar producto

        $notification = 'Paciente ' . $request->input('nombre1') . ' Actualizado Exitosamente';
        return redirect('/paciente') -> with( compact( 'notification' ) );
    }

    public function destroy( $id ) {
    	$paciente = Paciente::find( $id );
        $paciente -> delete(); //ELIMINAR
        $notification = 'El Paciente '.$paciente-> nombre1.' ha sido eliminado Exitosamente';
        return back() -> with( compact( 'notification' ) ); //nos devuelve a la pagina anterior
    }
}
