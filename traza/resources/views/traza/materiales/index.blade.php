	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de materiales <a href="materiales/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('traza.materiales.search')
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Compactación</th>
						<th>Precio</th>
						<th>Opciones</th>	
					</thead>
					@foreach($materiales as $material)
					<tr> 
						<td>{{$material->nombre}}</td>
						<td>{{$material->descripcion}}</td>
						<td>{{$material->compactacion}}</td>
						<td>{{$material->precio}}</td>
						<td>
							<a href="{{URL::action('MaterialController@edit',$material->idMaterial)}}">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-{{$material->idMaterial}}" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include ('traza.materiales.modal')
					@endforeach
				</table>	
			</div>
			{{$materiales->render()}}

		</div>
	</div>


	@endsection