	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de Abscisas                                                                   <a href="abscisas/create"><button class="btn btn-success">Nueva Abscisa</button> 
			</a></h3>

			@include('traza.abscisas.search')
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<TR>
						
							<th rowspan="1">Nombre</th>
							<th colspan="2">Volumen Transporte</th>
							<th colspan="2">Volumen Teorico</th>
							<th colspan="2">Coeficiente</th>
							<th colspan="2">volumen Real</th>
							<th rowspan="1">Opciones</th>
						</TR>
						<TR>
							<th></th>
							<TH>llenado</TH> <TH>excavado</TH> 
							<TH>llenado</TH> <TH>excavado</TH> 
							<TH>compactacion</TH> <TH>expansion</TH> 
							<TH>llenado</TH> <TH>excavado</TH> 
						</TR>
					</thead>
					@foreach($abscisa as $abs)
					<tr>
						
						<td>{{$abs->nombre}}</td>
						<td>{{$abs->volumenLlenado}} {{'M3'}}</td>
						<td>{{$abs->volumenExcavado}} {{'M3'}}</td>
						<td>{{$abs->volumen_llenado_teorico}} {{'M3'}}</td>
						<td>{{$abs->volumen_excavado_teorico}} {{'M3'}}</td>

                        @if($abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0)
                        <td>{{$abs->volumenLlenado}} {{'M3'}}</td>
						@elseif ($abs->volumenLlenado/$abs->volumen_llenado_teorico>=1.4||$abs->volumenLlenado/$abs->volumen_llenado_teorico <= 1.2)
						<td id="color1" >{{round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)}} {{'M3'}}</td>
						@else
						<td>{{round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)}} {{'M3'}}</td>
						@endif

                        @if($abs->volumen_excavado_teorico==0.00|$abs->volumen_excavado_teorico==0)
                         <td>{{$abs->volumen_excavado_teorico}} {{'M3'}}</td>
						@elseif ($abs->volumenExcavado/$abs->volumen_excavado_teorico>=1.4||$abs->volumenExcavado/$abs->volumen_excavado_teorico <= 1.2)
						<td id="color1" >{{round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)}} {{'M3'}}</td>
						@else
						<td>{{round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)}} {{'M3'}}</td>
						@endif

						<td>{{$abs->volumen_real_llenado}} {{'M3'}}</td>
						<td>{{$abs->volumen_real_excavado}} {{'M3'}}</td>
						<td>
							{!! Form::open(array('url'=>'traza/abscisas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
							<a href=""><button type="submit" class="btn btn" value="{{$abs->idAbscisa}}" name="searchText" ">Detalle</button></a>	
							{{Form:: close()}}

							<a href="{{URL::action('AbscisaController@edit',$abs->idAbscisa)}}">
								<button class="btn btn-info">Editar</button></a>

								<a href="" data-target="#modal-delete-{{$abs->idAbscisa}}" data-toggle="modal">
									<button class="btn btn-danger" name="eliminar">Eliminar</button></a>
								</td>

							</tr>
							@include ('traza.abscisas.modal')
							@endforeach
						</table>	
					</div>
					{{$abscisa->render()}}

				</div>
			</div>


			@endsection