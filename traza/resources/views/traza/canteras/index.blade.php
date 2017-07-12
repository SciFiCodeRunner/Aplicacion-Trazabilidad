@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Resumen Canteras</h3>
		@include('traza.canteras.search')
		<a href="{{URL::to('getExportNominaCanteras')}}"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#deb887;">
					
					<th>Nombre Cantera</th>
					<th>Telefono Cantera</th>
					<th>cantidad viajes</th>
					<th>Total material</th>
					<th>Total Pago material</th>
					<th>Opciones</th>	
				</thead>
				@foreach($cantera as $abs)
			
				<tr>


					<td>{{$abs->nombre}}</td>
					<td>{{$abs->descripcion}}</td>

				<td>{{$abs->contador}}</td>
				<td>{{number_format($abs->cantmaterial,2)}} mᶟ</td>
				<td>$ {{number_format($abs->preciomat, 2)}} </td>
					<td>{!! Form::open(array('url'=>'traza/canteras','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
						<div class="btn-group">

							<a href=""><button type="submit" class="btn btn" value="{{$abs->idAbscisa}}" name="searchText" ">Detalle</button></a>

							{{Form:: close()}}</td>
						</tr>
						@endforeach
					</table>	
				</div>


			</div>
		</div>


		@endsection