	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de empresas <a href="empresas/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			<?php echo $__env->make('traza.empresas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>direccion</th>
					
					</thead>
					<?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<td><?php echo e($emp->nombre); ?></td>
						<td><?php echo e($emp->direccion); ?></td>
						<td>
							<a href="<?php echo e(URL::action('EmpresaController@edit',$emp->idEmpresa)); ?>">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-<?php echo e($emp->idEmpresa); ?>" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					<?php echo $__env->make('traza.empresas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($empresas->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>