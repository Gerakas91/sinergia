@extends('layouts.app')

@section('title','Pacientes')

@section('titulo-contenido','Pacientes')

@section('header-class')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Editar Perfil {{ $paciente -> nombre1 . ' ' .$paciente -> nombre2  }}</h5>
            </div>
            <div class="card-body">
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
                <form method="post" action="{{ url('/paciente/'.$paciente->id.'/edit') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de Documento</label>
                                <select class="form-control" name="tipo_documento_id">
                                        <option class="form-control" value="I">Seleccione</option>
                                        @foreach ( $tiposDocumento as $tipo )
                                            <option class="form-control" value="{{ $tipo->id }}" @if( $tipo -> id == old( 'tipo_documento_id',$paciente->tipoidentificacion) )  selected @endif>{{ $tipo->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numeroidentificacion" class="col-md-8 control-label">Numero Identificacion</label>
                                <input id="name" type="text" class="form-control" name="numeroidentificacion" value="{{ $paciente->numeroidentificacion }}" onkeypress="return solo_numeros(event)" disabled="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre1" class="col-md-8 control-label">Nombre 1</label>
                                <input id="nombre1" type="text" class="form-control" name="nombre1" value="{{ old('nombre1',$paciente->nombre1) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre2" class="col-md-8 control-label">Nombre 2</label>
                                <input id="nombre2" type="text" class="form-control" name="nombre2" value="{{ old('nombre2',$paciente->nombre2) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido1" class="col-md-8 control-label">Apellido 1</label>
                                <input id="apellido1" type="text" class="form-control" name="apellido1" value="{{ old('apellido1',$paciente->apellido1) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido2" class="col-md-8 control-label">Apellido 2</label>
                                <input id="apellido2" type="text" class="form-control" name="apellido2" value="{{ old('apellido2',$paciente->apellido2) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control" name="genero">
                                    <option class="form-control" value="I">Seleccione</option>
                                    @if( $paciente->genero == 'femenino' and $paciente->genero == old('genero',$paciente->genero)  )
                                    <option class="form-control" value="femenino" selected>Femenino</option>
                                    <option class="form-control" value="masculino">Masculino</option>
                                    @else
                                    <option class="form-control" value="femenino">Femenino</option>
                                    <option class="form-control" value="masculino" selected>Masculino</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Departamento</label>
                                <select class="form-control" name="departamento_id" id="departamento_id" onchange="cargarMunicipio(this)">
                                        <option class="form-control" value="I">Seleccione</option>
                                        @foreach ( $departamentos as $departamento )
                                            <option class="form-control" value="{{ $departamento->id }}" @if( $departamento -> id == old( 'tipo_documento_id',$paciente->iddepartamento) )  selected @endif>{{ $departamento->nombdepa }}</option>
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
                    <div class="text-center">
                        <button class="btn btn-warning">Actualizar Paciente</button>
                        <a href="{{ url('/paciente') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            var id = $('#departamento_id').val();
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
                        var idIn = <?php echo $paciente->idmunicipio;?>;
                        console.log(idIn);
                        if(value.id == idIn ) {
                            $("#municipio_id").append("<option value=" + value.id + " selected>" + value.nombmuni + "</option>");
                        }
                        else {
                            $("#municipio_id").append("<option value=" + value.id + ">" + value.nombmuni + "</option>");
                        }
                    });
                }
            });
        });

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

@endsection
@endsection