<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

	<h3>Materiales obra <a href="materiales"><button class="btn btn-success">retornar</button></a></h3>
	<a href="<?php echo e(URL::to('getExportNominaMateriales')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead class="bg-warning">
				<th>Fecha</th>
						<th>Material Comun</th>

							<th>PedraPlen</th>
							<th>Terraplen</th>
							<th>Sub_Base</th>
							<th>Base</th>
							<th>Filtrante</th>
							<th>Sub_Rasante</th>

						</thead>
						<?php $__currentLoopData = $materialk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr  class="bg-success"> 
						<td><?php echo e($mat->fecha); ?></td>
							<td><?php echo e($mat->MaterialComun); ?> mᶟ </td>
							<td><?php echo e($mat->Pedraplen); ?> mᶟ </td>
							<td><?php echo e($mat->Terraplen); ?> mᶟ </td>
							<td><?php echo e($mat->Subbase); ?> mᶟ </td>
							<td><?php echo e($mat->Base); ?> mᶟ </td>
							<td><?php echo e($mat->Filtrante); ?> mᶟ </td>
							<td><?php echo e($mat->SubRasante); ?> mᶟ </td>

					


				</tr>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>	
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>