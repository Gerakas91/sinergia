@extends('layouts.app')

@section('title','Pacientes')

@section('titulo-contenido','Pacientes')

@section('header-class')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('contenido')
<div class="row">
    <!-- mostrar mensaje del controlador -->
    @if (session('notification'))

    <div class="alert alert-info alert-with-icon" data-notify="container">
        <button type="button" data-dismiss="alert" aria-label="Close" class="close">
            <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <span data-notify="icon" class="now-ui-icons ui-1_check"></span>
        <span data-notify="message">{{ session('notification') }}</span>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{-- <h4 class="card-title"> Simple Table</h4> --}}
                <a href="{{ url('/paciente/create') }}" class="btn btn-warning btn-round">Nuevo Paciente</a>
            </div>
            <div class="card-body">
                <table class="display nowrap" cellspacing="0" width="100%" id="tableTiposMovimientos">
                    <thead class=" text-primary">
                        <th class="text-center" colspan="2">
                            # Documento
                        </th>
                        <th>
                            Nombres
                        </th>
                        <th>
                            Apellidos
                        </th>
                        <th>
                            Genero
                        </th>
                        <th>
                            Departamento
                        </th>
                        <th>
                            Municipio
                        </th>
                        <th class="text-center">
                            Opciones
                        </th>
                    </thead>
                    <tbody>
                        @foreach( $pacientes as $paciente )
                            <tr>
                                <td>
                                    {{ $paciente -> tipoidentificacion() -> name }}
                                </td>
                                <td>{{ $paciente -> numeroidentificacion }}</td>
                                <td>{{ $paciente -> nombre1.' ' .$paciente -> nombre2}}</td>
                                <td>{{ $paciente -> apellido1.' '.$paciente -> apellido2 }}</td>
                                <td class="col-md-2">{{ $paciente -> genero }}</td>
                                <td class="col-md-2">{{ $paciente -> departamento() -> nombdepa }}</td>
                                <td class="col-md-2">{{ $paciente -> municipio() -> nombmuni }}</td>
                                <td class="td-actions text-right">
                                    <form method="post" class="delete">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a href="{{ url('/paciente/'.$paciente->id) }}" rel="tooltip" title="Ver paciente {{ $paciente -> nombre }}" class="btn btn-info btn-icon btn-sm">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/paciente/'.$paciente->id.'/edit') }}" rel="tooltip" title="Editar paciente {{ $paciente -> nombre1 }}" class="btn btn-success btn-icon btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class='btn btn-danger btn-icon btn-sm' rel="tooltip" title="Eliminar paciente {{ $paciente -> nombre1 }}" onclick="Delete('{{ $paciente -> nombre1 }}','{{ $paciente -> id }}')">
                                            <i class='fa fa-times'></i>
                                        </a>
                                        <!-- <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button> -->
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
        });
    </script>
    <script>
        function Delete( nameProduct , idDel ) {
            var pathname = window.location.pathname; //ruta actual
			$.confirm({
				theme: 'supervan',
				title: 'Eliminar paciente',
				content: 'Seguro(a) que deseas eliminar el paciente' + nameProduct + '. <br> Click Aceptar or Cancelar',
				icon: 'fa fa-question-circle',
				animation: 'scale',
				animationBounce: 2.5,
				closeAnimation: 'scale',
				opacity: 0.5,
				buttons: {
					'confirm': {
						text: 'Aceptar',
						btnClass: 'btn-blue',
						action: function () {
							$.confirm({
								theme: 'supervan',
								title: 'Estas Seguro ?',
								content: 'Una vez eliminado debes volver a crear el paciente',
								icon: 'fa fa-warning',
								animation: 'scale',
								animationBounce: 2.5,
								closeAnimation: 'zoom',
								buttons: {
									confirm: {
										text: 'Si, Estoy Seguro!',
										btnClass: 'btn-orange',
										action: function () {
                                            $('.delete').attr('action' , pathname + '/' + idDel );
											$('.delete').submit();
										}
									},
									cancel: {
										text: 'No, Cancelar',
										//$.alert('you clicked on <strong>cancel</strong>');
									}
								}
							});
						}
					},
					cancel: {
						text: 'Cancelar',
						//$.alert('you clicked on <strong>cancel</strong>');
					},
				}
			});
		}
    </script>
    <script>
        $(document).ready(function() {
            $('#tableTiposMovimientos').DataTable({
                "language": {

                    "emptyTable": "No hay pacientes registrados , click en el boton <b>Nuevo Paciente</b> para agregar uno nuevo",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "previous": "Anterior",
                        "next": "Siguiente",
                    },
                    "search": "Buscar: ",
                    "info": "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas",
                    "lengthMenu": "Mostrar _MENU_ pacientes por Página",
                    "zeroRecords": "No se encontro ningun resultado",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                },
                "responsive" : "true",
                "autoWidth": "true"
            });
        });
    </script>
@endsection