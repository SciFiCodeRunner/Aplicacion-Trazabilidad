	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de vehiculos <a href="vehiculos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			<?php echo $__env->make('traza.vehiculos.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			 <a href="<?php echo e(URL::to('getExport')); ?>"><button class="btn btn-success">Exportar</button></a>
			
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Empresa</th>
						<th>Conductor</th>
						<th>Placa	</th>
						<th>Cantidad viajes</th>
						<th>Volumen carga</th>
						<th>Volumen transportado</th>
						<th>Costo acarreo</th>	
						<th>Opciones</th>		
					</thead>
					<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($vehi->idVehiculo); ?></td>
						<td><?php echo e($vehi->Empresa); ?></td>
						<td><?php echo e($vehi->Conductor); ?></td>
						<td><?php echo e($vehi->placa); ?></td>
						<td><?php echo e($vehi->cantidad_viajes); ?></td>
						<td><?php echo e($vehi->volumen_carga); ?></td>
						<td><?php echo e($vehi->volumen_transportado); ?></td>
						<td><?php echo e($vehi->costo_acarreo); ?></td>
						<td>
							<a href="<?php echo e(URL::action('VehiculoController@edit',$vehi->idVehiculo)); ?>">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-<?php echo e($vehi->idVehiculo); ?>" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					<?php echo $__env->make('traza.vehiculos.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($vehiculos->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>