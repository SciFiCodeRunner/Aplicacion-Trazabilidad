	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de obras <a href="obra/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>NombreObra</th>
						<th>Responsable</th>
				
					</thead>
					@foreach($obra as $obr)
					<tr> 
					<td>{{$obr->nombreObra}}</td>
						<td>{{$obr->nombreObra}}</td>
						<td>{{$obr->Responsable}}</td>
					
					</tr>
					
					@endforeach
				</table>	
			</div>
			{{$obra->render()}}

		</div>
	</div>


	@endsection