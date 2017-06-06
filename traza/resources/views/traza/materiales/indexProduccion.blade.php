@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

	<h3>Materiales obra <a href="materiales"><button class="btn btn-success">retornar</button></a></h3>
	<a href="{{URL::to('getExportNominaMateriales')}}"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead class="bg-warning">
					<th>Fecha</th>
					<th>SubRasante</th>
					<th>Base</th>
					<th>SubBase</th>
					<th>filtrante</th>
					<th>terraplen</th>
					<th>materialComun</th>
					<th>pedraPlen</th>
					

				</thead>
				@foreach($materialk as $mat)
				<tr  class="bg-success"> 
					<td>{{$mat->fecha}}  </td>
					<td>{{$mat->SubRasante}} mᶟ </td>
					<td>{{$mat->Base}} mᶟ </td>
					<td>{{$mat->Subbase}} mᶟ </td>
					<td>{{$mat->Filtrante}} mᶟ </td>
					<td>{{$mat->Terraplen}} mᶟ </td>
					<td>{{$mat->MaterialComun}} mᶟ </td>
					<td>{{$mat->Pedraplen}} mᶟ </td>
					


				</tr>

				@endforeach
			</table>	
		</div>
	</div>
</div>


@endsection
