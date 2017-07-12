@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Nueva obra</h3>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'traza/obra','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombreObra">Nombre Obra</label>
						<input type="text" name="nombreObra" class="form-control" placeholder="NombreObra...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Responsable ">Responsable</label>
						<input type="text" name="Responsable" class="form-control" placeholder="Nombre Responsable...">
					

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Opciones </label>
					<div>
					<button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
					<button  class="btn btn-danger" href="traza/materiales" type="reset" name="cancelar">Cancelar</button>
					</div>
				</div>
			</div>
				
			</div>
			
		</div>
	</div>
	{!!Form::close()!!}

	@stop