@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Nuevo Vehículo</h3>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'traza/vehiculos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="placa">Placa</label>
						<input type="text" name="placa" class="form-control" placeholder="Placa...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="costo_acarreo">Costo acarreo 
						</label>
						<input type="text" name="costo_acarreo" pattern="([0-9]){0,15}([0-9]{0,15}.[0-9]{0,15})"  class="form-control" placeholder="Costo...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_carga">Volumen de carga</label>
						<input type="text" name="volumen_carga" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})"  class="form-control" placeholder="volumen...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Conductor (solo un conductor por vehiculo)</label>
						<select name="Choferes_idChofer" class="form-control">
							@foreach ($chofer as $cho)
							<option value="{{$cho->idChofer}}"> {{$cho->nombre}}
							</option>
							@endforeach
						</select>

						
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Empresa</label>
						<select name="Empresa_idEmpresa" class="form-control">
							@foreach ($empresa as $emp)
							<option value="{{$emp->idEmpresa}}">{{$emp->nombre}}

							</option>
							@endforeach
						</select>
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