	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de Abscisas En uso                                                                   <a href="abscisas/create"><button class="btn btn-success">Nueva Abscisa</button> 
			 </a></h3>

			<?php echo $__env->make('traza.abscisas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Volumen Llenado Sitio</th>
						<th>Volumen Excavado</th>
						<th>Volumen Llenado Teorico</th>
						<th>Volumen Excavado Teorico</th>
						<th>Opciones</th>	
					</thead>
					<?php $__currentLoopData = $abscisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->idAbscisa); ?></td>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->volumenLlenado); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumenExcavado); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumen_llenado_teorico); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumen_excavado_teorico); ?> <?php echo e('M3'); ?></td>
						<td>
							<?php echo Form::open(array('url'=>'traza/abscisas','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>

							<a href=""><button type="submit" class="btn btn" value="<?php echo e($abs->idAbscisa); ?>" name="searchText" ">Detalle</button></a>	
							<?php echo e(Form:: close()); ?>


							<a href="<?php echo e(URL::action('AbscisaController@edit',$abs->idAbscisa)); ?>">
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-<?php echo e($abs->idAbscisa); ?>" data-toggle="modal">
									<button class="btn btn-danger">Eliminar</button></a>
						</td>

					</tr>
							<?php echo $__env->make('traza.abscisas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>	
					</div>
					<?php echo e($abscisa->render()); ?>


				</div>
			</div>


			<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>