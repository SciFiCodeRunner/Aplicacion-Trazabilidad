@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Nombre Abscisa  :{{$abscisa->nombre}}</h3> 
			<a href="http://localhost:8000/traza/abscisas"><button class="btn btn-success">Retornar</button></a>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($abscisa,['method'=>'PATCH','action'=>['AbscisaController@update',$abscisa->idAbscisa]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text"  value="{{$abscisa->nombre}}" name="nombre" class="form-control" value ="K" placeholder="Nombre...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Descripcion</label>
							<select name="descripcion" class="form-control">
								<option   value="{{$abscisa->descripcion}}">{{$abscisa->descripcion}}</option>
								<option value="LD">LDERECHO
								<option value="LI">LIZQUIERDO
								<option value="E">EJE
												<option value="B">B/Completa
								</option>
								
							</select>


						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_excavado_teorico">Volumen Diseño corte</label>
						<input type="text"   value="{{$abscisa->volumen_excavado_teorico}}" name="volumen_excavado_teorico" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" class="form-control" placeholder="Volumen corte  teorico...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_llenado_teorico">Volumen Diseño lleno</label>
						<input type="text" value="{{$abscisa->volumen_llenado_teorico}}" name="volumen_llenado_teorico" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})"   class="form-control" placeholder="Volumen llenado teorico...">

					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_excavado_obra">Volumen Ejecutado corte</label>
						<input type="text" name="volumen_excavado_obra" value="{{$abscisa->volumen_excavado_obra}}"  pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})"  class="form-control" placeholder="volumen exc/obra...">
						<input type="hidden" name="estadoAbscisa" value="1" class="form-control" >

					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_llenado_obra">Volumen Ejecutado lleno</label>
						<input type="text" name="volumen_llenado_obra" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" value="{{$abscisa->volumen_llenado_obra}}" class="form-control" placeholder="volumen llenado/obra...">

					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label> </label>
					<div>
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button  class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>

	</div>
</div>
{!!Form::close()!!}

@stop
