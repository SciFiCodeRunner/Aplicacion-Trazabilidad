@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Busqueda Vehiculos</h3>
			@include('traza.vehiculosTransporte.search')
			<a href="{{URL::to('getExportNominaVehiculos')}}"> <button class="btn btn-success">Exportar excel</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead class="bg-success">
					
						<th>Vehiculo</th>
						<th>Conductor</th>
						<th>Cantidad de viajes</th>
						<th>Costo Acarreo </th>
						<th>PagoTransporte</th>
						<th>opcion</th>
					</thead>
					@foreach($vehiculos as $vehi)
					<tr >
						<td>{{$vehi->placa}}</td>
						<td>{{$vehi->nombre}}</td>
						<td>{{$vehi->cantidad_viajes}}
						<td> {{$vehi->costo_acarreo}} $</td>
							<td>{{$vehi->total}} $</td>
		<td>
								{!! Form::open(array('url'=>'traza/listas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

								<a href=""><button type="submit" class="btn btn" value="{{$vehi->idVehiculo}}" name="searchText" ">Detalle</button></a>	<br>
								
								{{Form:: close()}}
								</td>
					</tr>
					@endforeach
				</table>	
			</div>
			{{$vehiculos->render()}}

		</div>
	</div>


	@endsection