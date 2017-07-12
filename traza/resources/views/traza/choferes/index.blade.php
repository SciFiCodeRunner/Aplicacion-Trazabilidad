	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de conductores <a href="choferes/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('traza.choferes.search')
			<a href="{{URL::to('getExport')}}"> <button class="btn btn-success">Exportar excel</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Cedula</th>
						<th>Teléfono</th>
						
						<th>Vehículo</th>	
						<th>Opciones</th>	
					</thead>
					@foreach($choferes as $chofer)
						<td>{{$chofer->nombre}}</td>
						<td>{{$chofer->cedula}}</td>
						<td>{{$chofer->telefono}}</td>
						
						<td>{{$chofer->placa}}</td>
						<td>
							<a href="{{URL::action('ConductorController@edit',$chofer->idChofer)}}">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-{{$chofer->idChofer}}" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include ('traza.choferes.modal')
					@endforeach
				</table>	
			</div>
			{{$choferes->render()}}

		</div>
	</div>


	@endsection