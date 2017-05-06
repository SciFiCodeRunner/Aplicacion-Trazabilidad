@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Nuevo Conductor</h3>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'traza/choferes','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" placeholder="Nombre...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="cedula">Cedula</label>
						<input type="text" name="cedula" class="form-control" placeholder="Cedula...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="telefono">Telefono</label>
						<input type="text" name="telefono" class="form-control" placeholder="telefono...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direccion</label>
						<input type="text" name="direccion" class="form-control" placeholder="direccion...">

					</div>
				</div>
				
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Opciones </label>
					<div>
					<button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
					<button  class="btn btn-danger" href="traza/choferes" type="reset" name="cancelar">Cancelar</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	{!!Form::close()!!}

	@stop