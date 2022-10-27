@extends('layouts.app')

@section('title','Pacientes')

@section('titulo-contenido','Pacientes')

@section('header-class')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            {{-- <div class="image">
                <img src="../assets/img//bg5.jpg" alt="...">
            </div> --}}
            <div class="card-body">
                <div class="text-center">
                    <h5 class="title text-danger">Tipo de Documento</h5>
                    <p class="title text-center">
                        {{ $paciente -> tipoidentificacion }}
                    </p>
                    <h5 class="title text-danger">Numero de Documento</h5>
                    <p class="title text-center">
                        {{ $paciente -> numeroidentificacion }}
                    </p>
                    <h5 class="title text-danger">Nombre 1</h5>
                    <p class="title text-center">
                        {{ $paciente -> nombre1 }}
                    </p>
                    <h5 class="title text-danger">Nombre 2</h5>
                    <p class="title text-center">
                        {{ $paciente -> nombre2 }}
                    </p>
                    <h5 class="title text-danger">Apellido 1</h5>
                    <p class="title text-center">
                        {{ $paciente -> apellido1 }}
                    </p>
                    <h5 class="title text-danger">Apellido 2</h5>
                    <p class="title text-center">
                        {{ $paciente -> apellido2 }}
                    </p>
                    <h5 class="title text-danger">Genero</h5>
                    <p class="title text-center">
                        {{ $paciente -> genero }}
                    </p>
                    <h5 class="title text-danger">Departamento</h5>
                    <p class="title text-center">
                        {{ $paciente -> departamento()->nombdepa }}
                    </p>
                    <h5 class="title text-danger">Municipio</h5>
                    <p class="title text-center">
                        {{ $paciente -> municipio()->nombmuni }}
                    </p>
                    <div class="text-center">
                        <a href="{{ url('/paciente') }}" class="btn btn-info btn-round"><i class="now-ui-icons arrows-1_minimal-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection