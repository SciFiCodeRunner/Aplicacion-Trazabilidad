<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Detalle Cantera </h3> <a href="http://localhost:8000/traza/canteras"><button class="btn btn-success">Retornar</button></a>
	</div>
</div>

<h4 style="text-align:center" ><font color="red">Trazabilidad Material Salida</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead  style="background-color:#489CC6;">
		<th>Nombre</th>
		<th>Fecha</th>
		<th>#Recibo</th>
		<th>Placa</th>
		<th>Cantidad Material</th>	
		<th>Material</th>
		<th>Precio Material</th>
	</thead>
	<?php $__currentLoopData = $abscisa1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($abs->nombre); ?></td>
		<td><?php echo e($abs->fecha); ?></td>
		<td><?php echo e($abs->numeroRecibo); ?></td>
		<td><?php echo e($abs->placa); ?></td>
		<td><?php echo e($abs->cantidadMaterial); ?> 
			mᶟ </td>
			<td><?php echo e($abs->matnombre); ?>

			</td>
			<td><?php echo e($abs->precio); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>	
	<h4 style="text-align:center" ><font color="red">Trazabilidad Material Entrada</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead  style="background-color:#489CC6;">
		<th>Nombre</th>
		<th>Fecha</th>
		<th>#Recibo</th>
		<th>Placa</th>
		<th>Cantidad Material</th>	
		<th>Material</th>
		<th>Precio Material</th>
	</thead>
	<?php $__currentLoopData = $abscisa2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($abs->nombre); ?></td>
		<td><?php echo e($abs->fecha); ?></td>
		<td><?php echo e($abs->numeroRecibo); ?></td>
		<td><?php echo e($abs->placa); ?></td>
		<td><?php echo e($abs->cantidadMaterial); ?> 
			mᶟ </td>
			<td><?php echo e($abs->matnombre); ?>

			</td>
			<td><?php echo e($abs->precio); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>	

<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">	
			<h4  style="text-align:center" ><font color="red">Resumen Material Enviado</font></h4>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class= "table table-striped table-bordered table-condensed table-hover">
						<thead  style="background-color:#A7C648;">
			

							<th>Material Comun</th>
							<th>PedraPlen</th>
							<th>Terraplen</th>
							<th>Subw Base</th>
							<th>Base</th>
							<th>Filtrante</th>
							<th>Sub Rasante</th>
						</thead>
						<?php $__currentLoopData = $materialk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr > 
					
							<td><?php echo e($mat->MaterialComun); ?> </td>
							<td><?php echo e($mat->Pedraplen); ?></td>
							<td><?php echo e($mat->Terraplen); ?></td>
							<td><?php echo e($mat->Subbase); ?></td>
							<td><?php echo e($mat->Base); ?></td>
							<td><?php echo e($mat->Filtrante); ?></td>
							<td><?php echo e($mat->SubRasante); ?></td>

						</tr>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>


		<?php echo e($abscisa1->render()); ?>

		
	</div>




</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>