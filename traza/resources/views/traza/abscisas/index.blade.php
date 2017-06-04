		@extends ('layouts.admin')
		@section ('contenido')
		<div class="row">
			<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

				<h3>Listado de Abscisas <a href="abscisas/create"><button class="btn btn-success">Nueva Abscisa</button> <a href="{{URL::to('createCantera')}}"><button class="btn btn-success">Nueva Cantera</button> 				</a></h3>

				@include('traza.abscisas.search')
			</div>
		</div>
		<div class= "row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class= "table table-striped table-bordered table-condensed table-hover ">
						<!--http://musicforprogramming.net/-->
						@foreach($abscisa as $abs)
						<thead >
							<TR class="bg-info" >

								<th colspan="1" style="text-align:center">Abscisa</th>
								<th colspan="2" style="text-align:center">Vol/Diseño</th>
								<th colspan="2" style="text-align:center">Vol/Transportado</th>
								<th colspan="2" style="text-align:center">Vol/Obra</th>
								<th colspan="2" style="text-align:center">Vol/compacto</th>
								<th rowspan="1" style="text-align:center">Opciones</th>
							</TR>
							<TR  class="bg-success">
								<th></th>
								
								<TH style="text-align:center">lleno</TH> <TH style="text-align:center">corte</TH> 
								<TH style="text-align:center">lleno</TH>
								<TH style="text-align:center">corte</TH>
								<TH style="text-align:center">lleno</TH> <TH style="text-align:center">corte</TH> 
								<TH style="text-align:center">lleno</TH> 
								<TH style="text-align:center">corte</TH> 
								
								
							</TR>
						</thead>
						<tr style="text-align:center">
							
							<td >{{$abs->nombre}}</td>
							<!--volumen teorico-->
							<td>{{$abs->volumen_llenado_teorico}} mᶟ </td>
							<td>{{$abs->volumen_excavado_teorico}} mᶟ </td>
							<!--volumen transportado-->
							<td>{{$abs->volumenExcavado}} mᶟ  </td>
							<td>{{$abs->volumenLlenado}} mᶟ </td>
							

							<!--volumenCompactoTransportado-->


							<!--volumen en obra-->
							<td>{{$abs->volumen_llenado_obra}} mᶟ </td>
							<td>{{$abs->volumen_excavado_obra}} mᶟ </td>
							

							<td >{{($abs->volumenLlenado-$abs->volumen_llenado_obra)}}</td>
							<td >{{($abs->volumenExcavado-$abs->volumen_excavado_obra)}}</td>
							<td rowspan="4">
								{!! Form::open(array('url'=>'traza/abscisas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

								<a href=""><button type="submit" class="btn btn" value="{{$abs->idAbscisa}}" name="searchText" ">Detalle</button></a>	<br>
								
								{{Form:: close()}}
								<a href="{{URL::action('AbscisaController@edit',$abs->idAbscisa)}}">
									<button class="btn btn-info">Editar</button></a><br>

									<a href="" data-target="#modal-delete-{{$abs->idAbscisa}}" data-toggle="modal">
										<button class="btn btn-danger" name="eliminar">Eliminar</button></a>
										
									</td>

								</tr>
								<TR>
									<th colspan="1"></th>
									<th colspan="4" style="text-align:center">Coef/Teorico</th>
									<th colspan="4" style="text-align:center">Coef/Real</th>
									<th colspan="4" style="text-align:center"></th>
								</TR>
								<tr>
									<th colspan="1"></th>
									<th colspan="2" style="text-align:center">lleno</th>
									<th colspan="2" style="text-align:center">corte</th>
									<th colspan="2" style="text-align:center">lleno</th>
									<th colspan="2" style="text-align:center">corte</th>
									<th colspan="2"></th>
								</tr>

								<tr style="text-align:center">
									<!--coeficiente/teorico LLeno-->
									<td></td>
									@if($abs->volumenLlenado==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0)
									<td colspan="2">{{$abs->volumenLlenado}} mᶟ </td>
									@elseif ($abs->volumenLlenado/$abs->volumen_llenado_teorico>=1.25||$abs->volumenLlenado/$abs->volumen_llenado_teorico <= 1.35)
									<td id="color1" colspan="2">{{round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)}} mᶟ </td>
									@else
									<td colspan="2">{{round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)}} mᶟ </td>
									@endif
									<!--ccoeficiente teorico Excavado-->
									@if($abs->volumenExcavado==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0)
									<td colspan="2">{{$abs->volumen_excavado_teorico}} mᶟ </td>
									@elseif ($abs->volumenExcavado/$abs->volumen_excavado_teorico>1.35||$abs->volumenExcavado/$abs->volumen_excavado_teorico < 1.25)
									<td id="color1" colspan="2">{{round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)}} mᶟ </td>
									@else
									<td colspan="2">{{round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)}} mᶟ </td>
									@endif

									<!--coeficiente/real corte-->
									
									@if($abs->volumenLlenado||$abs->volumen_llenado_obra==0.00||$abs->volumenLlenado=0.00||$abs->volumenLlenado==0||$abs->volumenLlenado==0.0)
									<td colspan="2">{{$abs->volumen_llenado_obra}} mᶟ </td>
									@else
									<td colspan="2">{{round($abs->volumen_llenado_obra/$abs->volumenLlenado,2)}} mᶟ </td>
									@endif

									@if($abs->volumenExcavado||$abs->volumen_excavado_obra==0.00||$abs->volumenExcavado==0.00||$abs->volumenExcavado==0||$abs->volumenExcavado==0.0)
									<td colspan="2">{{$abs->volumen_excavado_obra}} mᶟ </td>
									@else
									<td colspan="2">{{round($abs->volumen_excavado_obra/$abs->volumenExcavado,2)}} mᶟ </td>
									@endif


								</tr>
								<tr>
									<th></th>
									<th colspan="8" style="text-align:center">Coef/Material(compacto)</th>
								</tr>
								<th></th>
								<!--coeficiente MaterialCompacto-->
								<td id="color2" colspan="8" style="text-align:center">{{round($abs->volumenLlenado/1.3,2)}}</td>
							</tr>
							@include ('traza.abscisas.modal')
							@endforeach
						</table>	
					</div>

				</div>
			</div>

			@endsection
