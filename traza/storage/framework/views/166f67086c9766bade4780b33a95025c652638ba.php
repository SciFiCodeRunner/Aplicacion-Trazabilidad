	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Detalle Abscisas </h3> <a href="http://localhost:8000/traza/abscisas"><button class="btn btn-success">Retornar</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
		<h4>Informacion General</h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Volumen Llenado Sitio</th>
						<th>Volumen Excavado</th>
						<th>Volumen Llenado Teorico</th>
						<th>Volumen Excavado Teorico</th>
					</thead>
					<?php $__currentLoopData = $abscisa3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->idAbscisa); ?></td>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->volumenLlenado); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumenExcavado); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumen_llenado_teorico); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumen_excavado_teorico); ?> <?php echo e('M3'); ?></td>

					</tr>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>	
						
						<h4>Llenado</h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>#Recibo</th>
						<th>Placa</th>
						<th>Cantidad Material</th>	
						<th>Material</th>
					</thead>
					<?php $__currentLoopData = $abscisa2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->fecha); ?></td>
						<td><?php echo e($abs->numeroRecibo); ?></td>
						<td><?php echo e($abs->placa); ?></td>
						<td><?php echo e($abs->cantidadMaterial); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->matnombre); ?>

						</td>

						
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
				

                <h4>Excavado</h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>#Recibo</th>
						<th>Placa</th>
						<th>Cantidad Material</th>	
						<th>Material</th>
					</thead>
					<?php $__currentLoopData = $abscisa1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->fecha); ?></td>
						<td><?php echo e($abs->numeroRecibo); ?></td>
						<td><?php echo e($abs->placa); ?></td>
						<td><?php echo e($abs->cantidadMaterial); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->matnombre); ?>

						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
				<?php echo e($abscisa1->render()); ?>

				<?php echo e($abscisa2->render()); ?>

					<?php echo e($abscisa3->render()); ?>

			</div>
			
			
		
		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>