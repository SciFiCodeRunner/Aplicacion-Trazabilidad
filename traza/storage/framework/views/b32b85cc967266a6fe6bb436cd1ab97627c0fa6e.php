<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Nómina vehículos de carga</h3>
		<?php echo $__env->make('traza.listas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<a href="<?php echo e(URL::to('getExportNominaVehiculos')); ?>"> <button class="btn btn-success">Exportar excel</button></a>
	</div>
</div>
<div class= "row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead class="bg-success">
					
					<th>Vehículo</th>
					<th>Conductor</th>
					<th>Cantidad de viajes</th>
					<th>Costo Acarreo </th>
					<th>PagoTransporte</th>
					<th>opción</th>
				</thead>
				<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr >
					<td><?php echo e($vehi->placa); ?></td>
					<td><?php echo e($vehi->nombre); ?></td>
					<td><?php echo e($vehi->cantidad_viajes); ?>

						<td> <?php echo e($vehi->costo_acarreo); ?> $</td>
						<td><?php echo e($vehi->total); ?> $</td>
						<td>
							<?php echo Form::open(array('url'=>'traza/listas','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>


							<a href=""><button type="submit" class="btn btn" value="<?php echo e($vehi->idVehiculo); ?>" name="searchText" ">Detalle</button></a>	<br>
							
							<?php echo e(Form:: close()); ?>

						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
			</div>
			<?php echo e($vehiculos->render()); ?>


		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>