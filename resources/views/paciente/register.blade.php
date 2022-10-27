@extends('layouts.app')

@section('title','DepositoLozada | Registrar')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('titulo-contenido','Registrar Paciente')

@section('header-class')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Registrar Paciente</h5>
            </div>
            <!-- Mostrar los errores capturados por validate -->
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <div class="card-body">
                <form method="POST" action="{{ route('paciente') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de Documento</label>
                                <select class="form-control" name="tipo_documento_id">
                                        <option class="form-control" value="I">Seleccione</option>
                                        @foreach ( $tiposDocumento as $tipo )
                                            <option class="form-control" value="{{ $tipo->id }}" @if( $tipo -> id == old( 'tipo_documento_id') )  selected @endif>{{ $tipo->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numeroidentificacion" class="col-md-8 control-label">Numero Identificacion</label>
                                <input id="name" type="text" class="form-control" name="numeroidentificacion" value="{{ old('numeroidentificacion') }}" onkeypress="return solo_numeros(event)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre1" class="col-md-8 control-label">Nombre 1</label>
                                <input id="nombre1" type="text" class="form-control" name="nombre1" value="{{ old('nombre1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre2" class="col-md-8 control-label">Nombre 2</label>
                                <input id="nombre2" type="text" class="form-control" name="nombre2" value="{{ old('nombre2') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido1" class="col-md-8 control-label">Apellido 1</label>
                                <input id="apellido1" type="text" class="form-control" name="apellido1" value="{{ old('apellido1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido2" class="col-md-8 control-label">Apellido 2</label>
                                <input id="apellido2" type="text" class="form-control" name="apellido2" value="{{ old('apellido2') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control" name="genero">
                                    <option class="form-control" value="I">Seleccione</option>
                                    <option class="form-control" value="femenino">Femenino</option>
                                    <option class="form-control" value="masculino">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Departamento</label>
                                <select class="form-control" name="departamento_id" id="departamento_id" onchange="cargarMunicipio(this)">
                                        <option class="form-control" value="I">Seleccione</option>
                                        @foreach ( $departamentos as $departamento )
                                            <option class="form-control" value="{{ $departamento->id }}">{{ $departamento->nombdepa }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Municipio</label>
                                <select class="form-control" name="municipio_id" id="municipio_id">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        function cargarMunicipio(campo) {
            //alert( campo.value );
            var id = campo.value;
            $("#municipio_id option").remove();
            $("#municipio_id").append('<option value="I">Selecciona Municipio</option>');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "/municipio/search/"+id,
                dataType: 'json',
                success: function( msg ){
                    console.log(msg.msg);
                    console.log(msg.carga);
                    var datos = JSON.parse(msg.carga);
                    console.log(datos);
                    $.each(datos, function (key, value) {
                        console.log(value);
                        $("#municipio_id").append("<option value=" + value.id + ">" + value.nombmuni + "</option>");
                    });
                }
            });
        }
    </script>
    <script>
        //validar que se digite solo numeros
        function solo_numeros(e){
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 48 && key <= 57) || (key==8))
        }
    </script>

@endsection
@endsection
