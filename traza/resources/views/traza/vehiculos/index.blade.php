	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de vehículos <a href="vehiculos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('traza.vehiculos.search')
			 <a href="{{URL::to('getExport')}}"><button class="btn btn-success">Exportar</button></a>
			
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead class="bg-info">
						<th>Empresa</th>
						<th>Conductor</th>
						<th>Placa	</th>
						<th>Costo acarreo</th>	
						<th>Opciones</th>		
					</thead>
					@foreach($vehiculos as $vehi)
					<tr>
						<td>{{$vehi->Empresa}}</td>
						<td>{{$vehi->Conductor}}</td>
						<td>{{$vehi->placa}}</td>
						<td>{{$vehi->costo_acarreo}}</td>
						<td>
							<a href="{{URL::action('VehiculoController@edit',$vehi->idVehiculo)}}">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-{{$vehi->idVehiculo}}" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include ('traza.vehiculos.modal')
					@endforeach
				</table>	
			</div>
			{{$vehiculos->render()}}

		</div>
	</div>


	@endsection