@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Resumen Vehículos</h3>
		@include('traza.listas.search')
		<a href="{{URL::to('getExportNominaVehiculos')}}"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead  style="background-color:#f0e68c ;">
					
					<th>Vehículo</th>
					<th>Conductor</th>
					<th>Cantidad de viajes</th>
					<th>Costo Acarreo </th>
					<th>PagoTransporte</th>
					<th>opción</th>
				</thead>
				@foreach($vehiculos as $vehi)
				<tr >
					<td>{{$vehi->placa}}</td>
					<td>{{$vehi->nombre}}</td>
					<td>{{$vehi->cantidad_viajes}}
						<td> {{number_format($vehi->costo_acarreo,2)}} $</td>
						<td>{{number_format($vehi->total,2)}} $</td>
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