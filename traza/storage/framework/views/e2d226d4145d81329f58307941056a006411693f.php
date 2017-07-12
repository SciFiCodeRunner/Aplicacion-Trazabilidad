<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Transporte  :<?php echo e($id); ?></h3>
			<?php if(count($errors)> 0 ): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($vehiculo,['method'=>'PATCH','action'=>['VehiculoTransporteController@update',$id]]); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="fecha">Fecha</label><br>
						<input type="date" name="fecha" value="<?php echo e($vehiculo->fecha); ?>" class="form-control">
					</div>
				   </div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="numeroRecibo">Número Recibo</label>
						<input type="text" name="numeroRecibo" class="form-control" placeholder="Placa..." value="<?php echo e($id); ?>">

					</div>
				</div>
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Vehículo</label>
						<select name="idVehiculo" class="form-control">
						<option value="<?php echo e($vehiculoCombo->idVehiculo); ?>"> <?php echo e($vehiculoCombo->placa); ?>

							</option>
							<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($vehi->idVehiculo); ?>"> <?php echo e($vehi->placa); ?>

							</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Material</label>
						<select name="idMaterial" class="form-control">
						<option value="<?php echo e($material->idMaterial); ?>"> <?php echo e($material->nombre); ?>

							</option>
							<?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<option value="<?php echo e($mat->idMaterial); ?>"> <?php echo e($mat->nombre); ?>

							</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Abscisa Cargue</label>
							<select name="id_abscisa_cargue" class="form-control">
						<option value="<?php echo e($abscargue->idAbscisa); ?>"><?php echo e($abscargue->nombre); ?>

							</option>
					
							<?php $__currentLoopData = $abscisas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<option value="<?php echo e($abs->idAbscisa); ?>"> <?php echo e($abs->nombre); ?>

							</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

						
					</div>
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Abscisa Descargue</label>
						<select name="id_abscisa_descargue" class="form-control">
						<option value="<?php echo e($absdescargue->idAbscisa); ?>"> <?php echo e($absdescargue->nombre); ?>

							</option>
							<?php $__currentLoopData = $abscisas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($abs->idAbscisa); ?>"> <?php echo e($abs->nombre); ?>

							</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="cantidadMaterial">Cantidad Material</label>
						<input type="text"  value="<?php echo e($vehiculo->cantidadMaterial); ?>" name="cantidadMaterial" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" class="form-control" placeholder="cantidad...">

					</div>
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="observaciones">Observaciones
						<textarea class="form-control" rows="2" name="observaciones" value="<?php echo e($vehiculo->observaciones); ?>"></textarea>
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label> </label>
					<div>
					<button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
					<button  class="btn btn-danger" type="reset" name="cancelar">Reset</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	<?php echo Form::close(); ?>


	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>