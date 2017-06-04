<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Nomina de canteras</h3>
		<?php echo $__env->make('traza.canteras.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<a href="<?php echo e(URL::to('getExportNominaVehiculos')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead class="bg-success">
					
					<th>Nombre</th>
					<th>material</th>
					<th>fecha</th>
					<th>cantidad de material</th>
					<th>Total Material</th>
					
				</thead>
				<?php $__currentLoopData = $cantera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr >
					<td><?php echo e($cant->nombre); ?></td>
					<td><?php echo e($cant->material); ?></td>
					<td><?php echo e($cant->fecha); ?>

						<td> <?php echo e($cant->cantidadMaterial); ?> $</td>
						<td><?php echo e($cant->total); ?> $</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($cantera->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>