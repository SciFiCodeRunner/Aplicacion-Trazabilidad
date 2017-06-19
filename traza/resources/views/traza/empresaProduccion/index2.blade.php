@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Detalle Empresa  :</h3> <a href="http://localhost:8000/traza/empresaProduccion"><button class="btn btn-success">Retornar</button></a>
	</div>
</div>

<h4 style="text-align:center" ><font color="red">Trazabilidad Material</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead  style="background-color:#9B7272";">
		<th>Fecha</th>
		<th>Empresa</th>
		<th>Abs cargue</th>
		<th>Abs descargue</th>

		<th>Placa</th>
		<th>Nombre Material</th>	
		<th> Cantidad Material</th>
		<th>Acarreo</th>
	</thead>
	@foreach($abscisa1 as $abs)
	<tr>
	<td>{{$abs->fecha}}</td>
	<td>{{$abs->empnombre}}</td>
		<td>{{$abs->cargue}}</td>
		<td>{{$abs->descargue}}</td>
		<td>{{$abs->placa}}</td>
		<td>{{$abs->matnombre}}</td>
		<td>{{$abs->cantidadMaterial}}</td>
		<td>{{$abs->costo_acarreo}}</td>


		</tr>
		@endforeach
	</table>	


	{{$abscisa1->render()}}

</div>




</div>
</div>


@endsection