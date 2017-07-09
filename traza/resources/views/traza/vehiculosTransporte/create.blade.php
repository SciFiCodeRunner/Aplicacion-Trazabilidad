@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Nuevo Transporte</h3>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'traza/vehiculosTransporte','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha">Fecha</label><br>
						<input type="date" name="fecha" class="form-control">
					</div>
				   </div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="numeroRecibo">Numero Recibo</label>
						<input type="text" name="numeroRecibo" value="Nº"class="form-control" placeholder="Recibo...">

					</div>
				</div>
					
				
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Vehículo</label>
							<select name="idVehiculo" class="form-control">
								@foreach ($vehiculos as $vehi)
								<option value="{{$vehi->idVehiculo}}"> {{$vehi->placa}}
								</option>
								@endforeach
							</select>


						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Material</label>
							<select name="idMaterial" class="form-control">
								@foreach ($materiales as $mat)
								<option value="{{$mat->idMaterial}}"> {{$mat->nombre}}
								</option>
								@endforeach
							</select>


						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Abscisa Cargue</label>
							<input type=text list=browsers name="id_abscisa_cargue" class="form-control" >
							<datalist id=browsers >
								@foreach ($abscisas as $abs)
								<datalist id=browsers >
								<option value="{{$abs->idAbscisa}}"> {{$abs->nombre}}
								</option>
								</datalist>
								@endforeach

							


						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Abscisa Descargue</label>
							<input type=text list=browsers name="id_abscisa_descargue" class="form-control" >
							<datalist id=browsers >
								@foreach ($abscisas as $abs)
								<datalist id=browsers >
								<option value="{{$abs->idAbscisa}}"> {{$abs->nombre}}
								</option>
								</datalist>
								@endforeach

							


						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="cantidadMaterial">Volumen Material</label>
							<input type="text" name="cantidadMaterial" pattern="([0-9]){0,15}([0-9]{0,15}.[0-9]{0,15})"  class="form-control" placeholder="cantidad...">

						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="observaciones">Observaciones
							<textarea class="form-control" rows="2" name="observaciones" placeholder="Observaciones..."></textarea>

						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label> </label>
							<div>
								<button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
								<button  class="btn btn-danger" type="reset" name="cancelar">Cancelar</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		{!!Form::close()!!}

		@stop