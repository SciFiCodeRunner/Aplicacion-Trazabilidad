	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Detalle Abscisas </h3> <a href="http://localhost:8000/traza/abscisas"><button class="btn btn-success">Retornar</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
		<h4 ><font color="red">
		Informacion General</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Volumen Llenado Sitio</th>
						<th>Volumen Excavado</th>
						<th>Volumen Llenado Teorico</th>
						<th>Volumen Excavado Teorico</th>
					</thead>
					@foreach($abscisa3 as $abs)
					<tr>
						<td>{{$abs->idAbscisa}}</td>
						<td>{{$abs->nombre}}</td>
						<td>{{$abs->volumenLlenado}} {{'M3'}}</td>
						<td>{{$abs->volumenExcavado}} {{'M3'}}</td>
						<td>{{$abs->volumen_llenado_teorico}} {{'M3'}}</td>
						<td>{{$abs->volumen_excavado_teorico}} {{'M3'}}</td>

					</tr>
							
							@endforeach
						</table>	
						
						<h4 ><font color="red">Llenado</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>#Recibo</th>
						<th>Placa</th>
						<th>Cantidad Material</th>	
						<th>Material</th>
					</thead>
					@foreach($abscisa2 as $abs)
					<tr>
						<td>{{$abs->nombre}}</td>
						<td>{{$abs->fecha}}</td>
						<td>{{$abs->numeroRecibo}}</td>
						<td>{{$abs->placa}}</td>
						<td>{{$abs->cantidadMaterial}} {{'M3'}}</td>
						<td>{{$abs->matnombre}}
						</td>

						
					</tr>
					@endforeach
				</table>	
				

                <h4 ><font color="red">Excavado</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>#Recibo</th>
						<th>Placa</th>
						<th>Cantidad Material</th>	
						<th>Material</th>
					</thead>
					@foreach($abscisa1 as $abs)
					<tr>
						<td>{{$abs->nombre}}</td>
						<td>{{$abs->fecha}}</td>
						<td>{{$abs->numeroRecibo}}</td>
						<td>{{$abs->placa}}</td>
						<td>{{$abs->cantidadMaterial}} {{'M3'}}</td>
						<td>{{$abs->matnombre}}
						</td>
					</tr>
					@endforeach
				</table>	
				{{$abscisa1->render()}}
				{{$abscisa2->render()}}
					{{$abscisa3->render()}}
			</div>
			
			
		
		</div>
	</div>


	@endsection