<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Canteras</h3>
		<?php echo $__env->make('traza.canteras.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<a href="<?php echo e(URL::to('getExportNominaCanteras')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Nombre Cantera</th>
					
					
					<th>Material</th>
					<th>Cantidad Material</th>	
					
				</thead>
				<?php $__currentLoopData = $cantera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($abs->fecha); ?></td>
					
					<td><?php echo e($abs->nombre); ?></td>
					
					<td><?php echo e($abs->matnombre); ?>

					</td>
					<td><?php echo e($abs->cantidadMaterial); ?> mᶟ </td>
					
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>	
		</div>
		<?php echo e($cantera->render()); ?>


	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>