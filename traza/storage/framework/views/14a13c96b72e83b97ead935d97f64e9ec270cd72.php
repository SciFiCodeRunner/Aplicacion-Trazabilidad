	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de obras <a href="obra/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>NombreObra</th>
						<th>Responsable</th>
				
					</thead>
					<?php $__currentLoopData = $obra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr> 
					<td><?php echo e($obr->nombreObra); ?></td>
						<td><?php echo e($obr->nombreObra); ?></td>
						<td><?php echo e($obr->Responsable); ?></td>
					
					</tr>
					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($obra->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>