	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Transporte en obra <a href="vehiculosTransporte/create"><button class="btn btn-success">Nuevo Transporte</button></a></h3>
			<?php echo $__env->make('traza.vehiculosTransporte.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Recibo</th>
						<th>Fecha</th>
						<th>Vehiculo</th>
						<th>Material</th>
						<th>Abscisa Cargue</th>
						<th>Abscisa Descargue</th>
						<th>Cantidad material</th>
						<th>Opciones</th>		
					</thead>
					<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($vehi->numeroRecibo); ?></td>
						<td><?php echo e($vehi->fecha); ?></td>
						<td><?php echo e($vehi->placa); ?></td>
						<td><?php echo e($vehi->material); ?></td>
						<td><?php echo e($vehi->abscargue); ?></td>
						<td><?php echo e($vehi->absdescargue); ?></td>
						<td><?php echo e($vehi->cantidadMaterial); ?></td>
						<td>
							<a href="<?php echo e(URL::action('VehiculoTransporteController@edit',$vehi->numeroRecibo)); ?>">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-<?php echo e($vehi->numeroRecibo); ?>" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					<?php echo $__env->make('traza.vehiculosTransporte.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($vehiculos->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>