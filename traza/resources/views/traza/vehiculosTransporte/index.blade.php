	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Transporte en obra <a href="vehiculosTransporte/create"><button class="btn btn-success">Nuevo Transporte</button></a></h3>
			@include('traza.vehiculosTransporte.search')
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Recibo</th>
						<th>Fecha</th>
						<th>Vehiculo</th>
						<th>Material</th>
						<th>Abscisa Cargue</th>
						<th>Abscisa Descargue</th>
						<th>Cantidad material</th>
						<th>Opciones</th>		
					</thead>
					@foreach($vehiculos as $vehi)
					<tr>
						<td>{{$vehi->numeroRecibo}}</td>
						<td>{{$vehi->fecha}}</td>
						<td>{{$vehi->placa}}</td>
						<td>{{$vehi->material}}</td>
						<td>{{$vehi->abscargue}}</td>
						<td>{{$vehi->absdescargue}}</td>
						<td>{{$vehi->cantidadMaterial}}</td>
						<td>
							<a href="{{URL::action('VehiculoTransporteController@edit',$vehi->numeroRecibo)}}">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-{{$vehi->numeroRecibo}}" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include ('traza.vehiculosTransporte.modal')
					@endforeach
				</table>	
			</div>
			{{$vehiculos->render()}}

		</div>
	</div>


	@endsection