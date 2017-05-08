	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de materiales <a href="materiales/create"><button class="btn btn-success">Nuevo</button></a></h3>
			<?php echo $__env->make('traza.materiales.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Compactacion</th>
						<th>Precio</th>
						<th>Opciones</th>	
					</thead>
					<?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr> 
						<td><?php echo e($material->nombre); ?></td>
						<td><?php echo e($material->descripcion); ?></td>
						<td><?php echo e($material->compactacion); ?></td>
						<td><?php echo e($material->precio); ?></td>
						<td>
							<a href="<?php echo e(URL::action('MaterialController@edit',$material->idMaterial)); ?>">
							<button class="btn btn-info">Editar</button></a>
							

							<a href="" data-target="#modal-delete-<?php echo e($material->idMaterial); ?>" data-toggle="modal">
							<button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					<?php echo $__env->make('traza.materiales.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($materiales->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>