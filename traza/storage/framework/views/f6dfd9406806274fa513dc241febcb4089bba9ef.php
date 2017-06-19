<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Vehículo Con Placa  :<?php echo e($vehiculo->placa); ?></h3>
			<?php if(count($errors)> 0 ): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($vehiculo,['method'=>'PATCH','action'=>['VehiculoController@update',$vehiculo->idVehiculo]]); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="placa">Placa</label>
						<input type="text" name="placa" class="form-control"
 							value="<?php echo e($vehiculo->placa); ?>" 
						 placeholder="Placa...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="costo_acarreo">Costo acarreo 
						</label>
						<input type="text" name="costo_acarreo" pattern="([0-9]){0,15}([0-9]{0,15}.[0-9]{0,15})" class="form-control" 	value="<?php echo e($vehiculo->costo_acarreo); ?>" 

						placeholder="Costo...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_carga">Volumen de carga</label>
						<input type="text" name="volumen_carga" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" class="form-control" 	value="<?php echo e($vehiculo->volumen_carga); ?>" 

						placeholder="volumen...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Empresa</label>
						<select name="idEmpresa" class="form-control"> 
						<option value="<?php echo e($consulta2->idEmpresa); ?>"><?php echo e($consulta2->nombre); ?>

							</option>
							<?php $__currentLoopData = $empresas2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($emp->idEmpresa); ?>"><?php echo e($emp->nombre); ?>

							</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Conductor</label>
						<select name="Choferes_idChofer" class="form-control"> 

						<option value="<?php echo e($consulta3->Choferes_idChofer); ?>"><?php echo e($consulta3->nombre); ?>

							</option>
							<?php $__currentLoopData = $choferes2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($cho->idChofer); ?>"><?php echo e($cho->nombre); ?>

							</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label> </label>
					<div>
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button  class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	<?php echo Form::close(); ?>


	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>