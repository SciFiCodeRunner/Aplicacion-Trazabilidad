	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Detalle Vehículo Producción </h3> <a href="listas"<button class="btn btn-success">Retornar</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead class="bg-success">
					
						<th>Vehículo</th>
						<th>Conductor</th>
						<th>Cantidad de viajes</th>
						<th>Costo Acarreo </th>
						<th>PagoTransporte</th>
						
					</thead>
					<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr >
						<td><?php echo e($vehi->placa); ?></td>
						<td><?php echo e($vehi->nombre); ?></td>
						<td><?php echo e($vehi->cantidad_viajes); ?>

						<td> <?php echo e(number_format($vehi->costo_acarreo,2)); ?> $</td>
							<td><?php echo e(number_format($vehi->total,2)); ?> $</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
						<h3 class= "bg-danger" >Movimientos</h3>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead class="bg-info">
						<th>Recibo</th>
						<th>Fecha</th>
						<th>Vehículo</th>
						<th>Abscisa Cargue</th>
						<th>Abscisa Descargue</th>
						<th>Material</th>
						<th>Cantidad material</th>	
					</thead>
					<?php $__currentLoopData = $vehiculos2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($vehi->numeroRecibo); ?></td>
						<td><?php echo e($vehi->fecha); ?></td>
						<td><?php echo e($vehi->placa); ?></td>
						<td><?php echo e($vehi->abscargue); ?></td>
						<td><?php echo e($vehi->absdescargue); ?></td>
						<td><?php echo e($vehi->material); ?></td>
						<td><?php echo e($vehi->cantidadMaterial); ?></td>
					</tr>
					<?php echo $__env->make('traza.vehiculosTransporte.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
				

           
			</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>