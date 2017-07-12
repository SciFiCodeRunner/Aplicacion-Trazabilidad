<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Detalle Empresa  :</h3> <a href="http://localhost:8000/traza/empresaProduccion"><button class="btn btn-success">Retornar</button></a>
	</div>
</div>

<h4 style="text-align:center" ><font color="red">Resumen Transporte Material</font></h4>
<table class= "table table-striped table-bordered table-condensed table-hover">
	<thead  style="background-color:#9B7272";">
		<th>Fecha</th>
		<th>Empresa</th>
		<th>Abs cargue</th>
		<th>Abs descargue</th>

		<th>Placa</th>
		<th>Nombre Material</th>	
		<th> Cantidad Material</th>
		<th>Costo Acarreo</th>
	</thead>
	<?php $__currentLoopData = $abscisa1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
	<td><?php echo e($abs->fecha); ?></td>
	<td><?php echo e($abs->empnombre); ?></td>
		<td><?php echo e($abs->cargue); ?></td>
		<td><?php echo e($abs->descargue); ?></td>
		<td><?php echo e($abs->placa); ?></td>
		<td><?php echo e($abs->matnombre); ?></td>
		<td><?php echo e($abs->cantidadMaterial); ?>   mᶟ</td>
		<td>$ <?php echo e($abs->costo_acarreo); ?></td>


		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>	


	<?php echo e($abscisa1->render()); ?>


</div>




</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>