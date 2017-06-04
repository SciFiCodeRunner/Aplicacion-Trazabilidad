	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de empresas <a href="empresas/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('traza.empresas.search')
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>direccion</th>
					
					</thead>
					@foreach($empresas as $emp)
						<td>{{$emp->nombre}}</td>
						<td>{{$emp->direccion}}</td>
						<td>
							<a href="{{URL::action('EmpresaController@edit',$emp->idEmpresa)}}">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-{{$emp->idEmpresa}}" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include ('traza.empresas.modal')
					@endforeach
				</table>	
			</div>
			{{$empresas->render()}}

		</div>
	</div>


	@endsection