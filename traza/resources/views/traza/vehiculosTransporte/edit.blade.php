@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Transporte  :{{$id}}</h3>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($vehiculo,['method'=>'PATCH','action'=>['VehiculoTransporteController@update',$id]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha">Fecha</label><br>
						<input type="date" name="fecha" value="{{$vehiculo->fecha}}">
					</div>
				   </div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="numeroRecibo">numeroRecibo</label>
						<input type="text" name="numeroRecibo" class="form-control" placeholder="Placa..." value="{{$id}}">

					</div>
				</div>
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Vehículo</label>
						<select name="idVehiculo" class="form-control">
						<option value="{{$vehiculoCombo->idVehiculo}}"> {{$vehiculoCombo->placa}}
							</option>
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
						<option value="{{$material->idMaterial}}"> {{$material->nombre}}
							</option>
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
							<select name="id_abscisa_cargue" class="form-control">
						<option value="{{$abscargue->idAbscisa}}">{{$abscargue->nombre}}
							</option>
					
							@foreach ($abscisas as $abs)

							<option value="{{$abs->idAbscisa}}"> {{$abs->nombre}}
							</option>
							@endforeach
						</select>

						
					</div>
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Abscisa Descargue</label>
						<select name="id_abscisa_descargue" class="form-control">
						<option value="{{$absdescargue->idAbscisa}}"> {{$absdescargue->nombre}}
							</option>
							@foreach ($abscisas as $abs2)
							<option value="{{$abs2->idAbscisa}}"> {{$abs2->nombre}}
							</option>
							@endforeach
						</select>

						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="cantidadMaterial">Cantidad Material</label>
						<input type="text"  value="{{$vehiculo->cantidadMaterial}}" name="cantidadMaterial" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" class="form-control" placeholder="cantidad...">

					</div>
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="observaciones">Observaciones
						<textarea class="form-control" rows="2" name="observaciones" value="{{$vehiculo->observaciones}}"></textarea>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label> </label>
					<div>
					<button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
					<button  class="btn btn-danger" type="reset" name="cancelar">Reset</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	{!!Form::close()!!}

	@stop
