	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Empresas Transporte</h3>
			<?php echo $__env->make('traza.empresaProduccion.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<a href="<?php echo e(URL::to('getExportNominaEmpresas')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead style="background-color:#9acd32;">
						
						<th>Nombre Empresa</th>
						<th>Telefono Empresa</th>
						<th>Cantidad viajes</th>
						<th>Total Material</th>
						<th>Total Pago</th>
						<th>Opciones</th>		
					</thead>
					<?php $__currentLoopData = $empresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->direccion); ?></td>
						<td><?php echo e($abs->contador); ?></td>
						<td><?php echo e($abs->totalMaterial); ?> mᶟ</td>
						<td>$ <?php echo e(number_format($abs->preciomat,2)); ?> </td>

						<td><?php echo Form::open(array('url'=>'traza/empresaProduccion','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>

							<div class="btn-group">

								<a href=""><button type="submit" class="btn btn" value="<?php echo e($abs->idEmpresa); ?>" name="searchText" ">Detalle</button></a>


								<?php echo e(Form:: close()); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>	
					</div>


				</div>
			</div>


			<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>