<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Resumen Canteras</h3>
		<?php echo $__env->make('traza.canteras.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<a href="<?php echo e(URL::to('getExportNominaCanteras')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#deb887;">
					
					<th>Nombre Cantera</th>
					<th>Telefono Cantera</th>
					<th>cantidad viajes</th>
					<th>Total material</th>
					<th>Total Pago material</th>
					<th>Opciones</th>	
				</thead>
				<?php $__currentLoopData = $cantera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
				<tr>


					<td><?php echo e($abs->nombre); ?></td>
					<td><?php echo e($abs->descripcion); ?></td>

				<td><?php echo e($abs->contador); ?></td>
				<td><?php echo e(number_format($abs->cantmaterial,2)); ?> mᶟ</td>
				<td>$ <?php echo e(number_format($abs->preciomat, 2)); ?> </td>
					<td><?php echo Form::open(array('url'=>'traza/canteras','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>

						<div class="btn-group">

							<a href=""><button type="submit" class="btn btn" value="<?php echo e($abs->idAbscisa); ?>" name="searchText" ">Detalle</button></a>

							<?php echo e(Form:: close()); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>	
				</div>


			</div>
		</div>


		<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>