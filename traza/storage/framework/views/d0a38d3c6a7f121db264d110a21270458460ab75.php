	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de conductores <a href="choferes/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			<?php echo $__env->make('traza.choferes.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<a href="<?php echo e(URL::to('getExport')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Cedula</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Conduce</th>	
						<th>Opciones</th>	
					</thead>
					<?php $__currentLoopData = $choferes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chofer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<td><?php echo e($chofer->nombre); ?></td>
						<td><?php echo e($chofer->cedula); ?></td>
						<td><?php echo e($chofer->telefono); ?></td>
						<td><?php echo e($chofer->direccion); ?></td>
						<td><?php echo e($chofer->placa); ?></td>
						<td>
							<a href="<?php echo e(URL::action('ConductorController@edit',$chofer->idChofer)); ?>">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-<?php echo e($chofer->idChofer); ?>" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					<?php echo $__env->make('traza.choferes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($choferes->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>