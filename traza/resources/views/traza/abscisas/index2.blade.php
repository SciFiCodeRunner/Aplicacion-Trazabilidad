@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Detalle Abscisas </h3> <a href="http://localhost:8000/traza/abscisas"><button class="btn btn-success">Retornar</button></a>
	</div>
</div>

<h4 align="center"><font color="red">
	Información Material</font></h4>
	<table class= "table table-striped table-bordered table-condensed table-hover ">
		<!--http://musicforprogramming.net/-->
		@foreach($abscisa as $abs)
		<thead >
			<TR class="bg-info" >
				<th colspan="1" style="text-align:center">Abscisa</th>
				<th colspan="2" style="text-align:center">Vol/Diseño</th>
				<th colspan="2" style="text-align:center">Vol/Transportado</th>
				<th colspan="2" style="text-align:center">Vol/Ejecutado</th>
				<th colspan="2" style="text-align:center">Vol/Diferencia</th>
			</TR>
			<TR  class="bg-success">
				<th></th>

				<TH style="text-align:center">corte</TH> 
				<TH style="text-align:center">lleno</TH> 
				<TH style="text-align:center">corte/Material Comun</TH>
				<TH style="text-align:center">lleno/Terraplen</TH>
				<TH style="text-align:center">corte</TH>
				<TH style="text-align:center">lleno</TH> 
				<TH style="text-align:center">corte</TH> 
				<TH style="text-align:center">lleno</TH> 


			</TR>
		</thead>
		<tr style="text-align:center">

			<td >{{$abs->nombre}}</td>
			<!--volumen teorico-->
			<td>{{$abs->volumen_excavado_teorico}} mᶟ </td>
			<td>{{$abs->volumen_llenado_teorico}} mᶟ </td>

			<!--volumen transportado COLLECTION2-->
			<td>{{$Terraplen}} mᶟ</td>
			<td>{{$Comun}} mᶟ</td>



			<!--volumen en obra-->
			<td>{{$abs->volumen_excavado_obra}} mᶟ </td>
			<td>{{$abs->volumen_llenado_obra}} mᶟ </td>


			<!--volumen compacto-->
			
			<td >{{round($Terraplen/1.3-$abs->volumen_excavado_obra,2)}} mᶟ</td>
			<td >{{round($Comun/1.3-$abs->volumen_llenado_obra,2)}} mᶟ</td>
		</tr>
		<TR>
			<th colspan="1" class="bg-info" ></th>
			<th colspan="4" style="text-align:center" class="bg-info" >Coef/Teorico</th>
			<th colspan="4" style="text-align:center" class="bg-info" >Coef/Real</th>
			<th colspan="4" style="text-align:center"></th>
		</TR>
		<tr >
			<th colspan="1" class="bg-success"></th>
			<th colspan="2" style="text-align:center" class="bg-success">corte</th>
			<th colspan="2" style="text-align:center" class="bg-success">lleno</th>
			<th colspan="2" style="text-align:center" class="bg-success">corte</th>
			<th colspan="2" style="text-align:center" class="bg-success">lleno</th>
			<th colspan="2"></th>
		</tr>

		<tr style="text-align:center">
			<td></td>
			<!--ccoeficiente teorico Excavado-->
			@if($Terraplen==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0)
			<td colspan="2">{{0}}  </td>
			@elseif ($Terraplen/$abs->volumen_excavado_teorico>1.35||$Terraplen/$abs->volumen_excavado_teorico < 1.25)
			<td id="color1" colspan="2">{{round($Terraplen/$abs->volumen_excavado_teorico,2)}} </td>
			@else
			<td colspan="2">{{round($Terraplen/$abs->volumen_excavado_teorico,2)}}  </td>
			@endif

			<!--coeficiente/teorico LLeno-->

			@if($Comun==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0)
			<td colspan="2">{{0}}  </td>
			@elseif ($Comun/$abs->volumen_llenado_teorico>1.35||$Comun/$abs->volumen_llenado_teorico < 1.25)
			<td id="color1" colspan="2">{{round($Comun/$abs->volumen_llenado_teorico,2)}} </td>
			@else
			<td colspan="2">{{round($Comun/$abs->volumen_llenado_teorico,2)}} </td>
			@endif


			<!--coeficiente/real corte-->

			@if($Terraplen==0||$abs->volumen_excavado_obra==0||$abs->volumen_excavado_obra==0.0||$Terraplen==0.00||$Terraplen==0.0)
			<td colspan="2">{{0}}  </td>
			@else
			<td colspan="2">{{round($Terraplen/$abs->volumen_excavado_obra,2)}} </td>
			@endif


			<!--coeficienteRealLLeno-->
			@if($Comun==0||$abs->volumen_llenado_obra==0||$abs->volumen_llenado_obra==0.0||$abs->volumen_llenado_obra==0.00||$Comun==0.00||$Comun==0.0)
			<td colspan="2">{{0}} </td>
			@else
			<td colspan="2">{{round($Comun/$abs->volumen_llenado_obra,2)}}  </td>
			@endif

		</tr>
		
	</tr>
	@include ('traza.abscisas.modal')
	@endforeach
</table>	

<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">	
			<h4  style="text-align:center" ><font color="red">Resumen Materiales</font></h4>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class= "table table-striped table-bordered table-condensed table-hover">
						<thead class="bg-warning">
							<th>Material Comun</th>
							<th>PedraPlen</th>
							<th>Terraplen</th>
							<th>Sub Base</th>
							<th>Base</th>
							<th>Filtrante</th>
							<th>Sub Rasante</th>

						</thead>
						<tr  class="bg-success"> 
						<td>{{$material2}} mᶟ </td>
						@foreach($materialk as $mat)
						
							
							<td>{{$mat->Pedraplen}} mᶟ </td>
							<td>{{$mat->Terraplen}} mᶟ </td>
							<td>{{$mat->Subbase}} mᶟ </td>
							<td>{{$mat->Base}} mᶟ </td>
							<td>{{$mat->Filtrante}} mᶟ </td>
							<td>{{$mat->SubRasante}} mᶟ </td>

						</tr>

						@endforeach
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>


<h4 style="text-align:center" ><font color="red">Trazabilidad Corte</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead class="bg-success">
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
		<td>{{$abs->cantidadMaterial}} 
			mᶟ </td>
			<td>{{$abs->matnombre}}
			</td>
		</tr>
		@endforeach
	</table>	

	<h4 style="text-align:center" ><font color="red">Trazabilidad Lleno</font></h4>	
	<table class= "table table-striped table-bordered table-condensed table-hover">
		<thead class="bg-success">
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
			<td>{{$abs->cantidadMaterial}} 
				mᶟ </td>
				<td>{{$abs->matnombre}}


				</td>


			</tr>
			@endforeach
		</table>	



		{{$abscisa1->render()}}
		{{$abscisa2->render()}}
	</div>




</div>
</div>


@endsection