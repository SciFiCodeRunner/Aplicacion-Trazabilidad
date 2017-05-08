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
		<h4 align="center"><font color="red">
		Informacion General</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<TR>
						
							<th rowspan="1">Nombre</th>
							<th colspan="2">Vol/Diseño</th>
							<th colspan="2">Vol/Transportado</th>
							<th colspan="2">Vol/Obra</th>
							<th colspan="2">Coef/Teorico</th>
								<th colspan="1">Coef/Material</th>
								<th colspan="2">Coef/Real</th>
								<th colspan="2">Vol/compacto</th>
						</TR>
						<TR>
							<th></th>
							<TH>lleno</TH> <TH>corte</TH> 
							<TH>lleno</TH> <TH>corte</TH> 
							<TH>lleno</TH>
							<TH>corte</TH>
							<TH>lleno</TH> <TH>corte</TH> 
							<TH>compacto</TH> <TH>lleno</TH> 
							<TH>corte</TH> 
							 <TH>lleno</TH> <TH>corte</TH> 
							
						</TR>
					</thead>
					@foreach($abscisa as $abs)
					<tr>
						
						<td>{{$abs->nombre}}</td>
   						<!--volumen teorico-->
						<td>{{$abs->volumen_llenado_teorico}} {{'M3'}}</td>
						<td>{{$abs->volumen_excavado_teorico}} {{'M3'}}</td>
						<!--volumen transportado-->
						<td>{{$abs->volumenLlenado}} {{'M3'}}</td>
						<td>{{$abs->volumenExcavado}} {{'M3'}}</td>

						<!--volumenCompactoTransportado-->


						<!--volumen en obra-->
						<td>{{$abs->volumen_llenado_obra}} {{'M3'}}</td>
						<td>{{$abs->volumen_excavado_obra}} {{'M3'}}</td>
						<!--coeficiente/teorico LLeno-->
                        @if($abs->volumenLlenado==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0)
                        <td>{{$abs->volumen_llenado_teorico}} {{'M3'}}</td>
						@elseif ($abs->volumenLlenado/$abs->volumen_llenado_teorico>=1.25||$abs->volumenLlenado/$abs->volumen_llenado_teorico <= 1.35)
						<td id="color1" >{{round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)}} {{'M3'}}</td>
						@else
						<td>{{round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)}} {{'M3'}}</td>
						@endif
						<!--ccoeficiente teorico Excavado-->
                        @if($abs->volumenExcavado==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0)
                         <td>{{$abs->volumen_excavado_teorico}} {{'M3'}}</td>
						@elseif ($abs->volumenExcavado/$abs->volumen_excavado_teorico>1.35||$abs->volumenExcavado/$abs->volumen_excavado_teorico < 1.25)
						<td id="color1" >{{round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)}} {{'M3'}}</td>
						@else
						<td>{{round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)}} {{'M3'}}</td>
						@endif

						<!--coeficiente MaterialCompacto-->
						<td id="color2" >{{round($abs->volumenLlenado/1.3,2)}}</td>

<!--coeficiente/real corte-->
						 @if($abs->volumenExcavado||$abs->volumen_excavado_obra==0.00||$abs->volumenExcavado==0.00||$abs->volumenExcavado==0||$abs->volumenExcavado==0.0)
                         <td>{{$abs->volumen_excavado_obra}} {{'M3'}}</td>
						@else
						<td>{{round($abs->volumen_excavado_obra/$abs->volumenExcavado,2)}} {{'M3'}}</td>
						@endif

						 @if($abs->volumenLlenado||$abs->volumen_llenado_obra==0.00||$abs->volumenLlenado=0.00||$abs->volumenLlenado==0||$abs->volumenLlenado==0.0)
                         <td>{{$abs->volumen_llenado_obra}} {{'M3'}}</td>
                         @else
						<td>{{round($abs->volumen_llenado_obra/$abs->volumenLlenado,2)}} {{'M3'}}</td>
						@endif
						



						<td >{{($abs->volumenLlenado-$abs->volumen_llenado_obra)}}</td>
						<td >{{($abs->volumenExcavado-$abs->volumen_excavado_obra)}}</td>
						</tr>
						@endforeach
						</table>	
						
						<h4 ><font color="red">Lleno</font></h4>
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
				

                <h4 ><font color="red">Corte</font></h4>
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
					{{$abscisa->render()}}
			</div>
			
			
		
		</div>
	</div>


	@endsection