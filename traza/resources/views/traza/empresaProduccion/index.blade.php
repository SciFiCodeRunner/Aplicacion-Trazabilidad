	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Empresas Transporte</h3>
			@include('traza.empresaProduccion.search')
			<a href="{{URL::to('getExportNominaEmpresas')}}"> <button class="btn btn-success">Exportar excel</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead style="background-color:#9acd32;">
						
						<th>Nombre Empresa</th>
						<th>Telefono Empresa</th>
						<th>Cantidad viajes</th>
						<th>Total Material</th>
						<th>Total Pago</th>
						<th>Opciones</th>		
					</thead>
					@foreach($empresa as $abs)
					<tr>
						<td>{{$abs->nombre}}</td>
						<td>{{$abs->direccion}}</td>
						<td>{{$abs->contador}}</td>
						<td>{{$abs->totalMaterial}} mᶟ</td>
						<td>$ {{number_format($abs->preciomat,2)}} </td>

						<td>{!! Form::open(array('url'=>'traza/empresaProduccion','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
							<div class="btn-group">

								<a href=""><button type="submit" class="btn btn" value="{{$abs->idEmpresa}}" name="searchText" ">Detalle</button></a>


								{{Form:: close()}}</td>
							</tr>
							@endforeach
						</table>	
					</div>


				</div>
			</div>


			@endsection