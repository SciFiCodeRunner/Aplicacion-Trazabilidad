<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

	<h3>Materiales obra                        <a href="materiales/create"><button class="btn btn-success">retornar</button></a></h3>
	<a href="<?php echo e(URL::to('getExportNominaMateriales')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead class="bg-warning">
					<th>Fecha</th>
					<th>SubRasante</th>
					<th>Base</th>
					<th>SubBase</th>
					<th>filtrante</th>
					<th>terraplen</th>
					<th>materialComun</th>
					<th>pedraPlen</th>
					

				</thead>
				<?php $__currentLoopData = $materialk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr  class="bg-success"> 
					<td><?php echo e($mat->fecha); ?> mᶟ </td>
					<td><?php echo e($mat->SubRasante); ?> mᶟ </td>
					<td><?php echo e($mat->base); ?> mᶟ </td>
					<td><?php echo e($mat->Subbase); ?> mᶟ </td>
					<td><?php echo e($mat->filtrante); ?> mᶟ </td>
					<td><?php echo e($mat->terraplen); ?> mᶟ </td>
					<td><?php echo e($mat->materialComun); ?> mᶟ </td>
					<td><?php echo e($mat->pedraplen); ?> mᶟ </td>
					


				</tr>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>	
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>