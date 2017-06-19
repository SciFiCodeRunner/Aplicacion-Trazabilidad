@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Detalle Cantera </h3> <a href="http://localhost:8000/traza/canteras"><button class="btn btn-success">Retornar</button></a>
	</div>
</div>

<h4 style="text-align:center" ><font color="red">Trazabilidad Material Salida</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead  style="background-color:#489CC6;">
		<th>Nombre</th>
		<th>Fecha</th>
		<th>#Recibo</th>
		<th>Placa</th>
		<th>Cantidad Material</th>	
		<th>Material</th>
		<th>Precio Material</th>
	</thead>
	@foreach($abscisa1 as $abs)
	<tr>
		<td>{{$abs->nombre}}</td>
		<td>{{$abs->fecha}}</td>
		<td>{{$abs->numeroRecibo}}</td>
		<td>{{$abs->placa}}</td>
		<td>{{$abs->cantidadMaterial}} 
			mᶟ </td>
			<td>{{$abs->matnombre}}
			</td>
			<td>{{$abs->precio}}</td>
		</tr>
		@endforeach
	</table>	
	<h4 style="text-align:center" ><font color="red">Trazabilidad Material Entrada</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead  style="background-color:#489CC6;">
		<th>Nombre</th>
		<th>Fecha</th>
		<th>#Recibo</th>
		<th>Placa</th>
		<th>Cantidad Material</th>	
		<th>Material</th>
		<th>Precio Material</th>
	</thead>
	@foreach($abscisa2 as $abs)
	<tr>
		<td>{{$abs->nombre}}</td>
		<td>{{$abs->fecha}}</td>
		<td>{{$abs->numeroRecibo}}</td>
		<td>{{$abs->placa}}</td>
		<td>{{$abs->cantidadMaterial}} 
			mᶟ </td>
			<td>{{$abs->matnombre}}
			</td>
			<td>{{$abs->precio}}</td>
		</tr>
		@endforeach
	</table>	

<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">	
			<h4  style="text-align:center" ><font color="red">Resumen Material Enviado</font></h4>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class= "table table-striped table-bordered table-condensed table-hover">
						<thead  style="background-color:#A7C648;">
			

							<th>Material Comun</th>
							<th>PedraPlen</th>
							<th>Terraplen</th>
							<th>Subw Base</th>
							<th>Base</th>
							<th>Filtrante</th>
							<th>Sub Rasante</th>
						</thead>
						@foreach($materialk as $mat)
						<tr > 
					
							<td>{{$mat->MaterialComun}} </td>
							<td>{{$mat->Pedraplen}}</td>
							<td>{{$mat->Terraplen}}</td>
							<td>{{$mat->Subbase}}</td>
							<td>{{$mat->Base}}</td>
							<td>{{$mat->Filtrante}}</td>
							<td>{{$mat->SubRasante}}</td>

						</tr>

						@endforeach
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>


		{{$abscisa1->render()}}
		
	</div>




</div>
</div>


@endsection