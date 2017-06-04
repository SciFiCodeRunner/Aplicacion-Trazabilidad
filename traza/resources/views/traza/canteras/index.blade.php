@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Canteras</h3>
		@include('traza.canteras.search')
		<a href="{{URL::to('getExportNominaCanteras')}}"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Nombre Cantera</th>
					
					
					<th>Material</th>
					<th>Cantidad Material</th>	
					

				</thead>
				@foreach($cantera as $abs)
				<tr>
					<td>{{$abs->fecha}}</td>
					
					<td>{{$abs->nombre}}</td>
					
					<td>{{$abs->matnombre}}
					</td>
					<td>{{$abs->cantidadMaterial}} mᶟ </td>
					
				</tr>
				@endforeach
			</table>	
		</div>
		{{$cantera->render()}}

	</div>
</div>


@endsection