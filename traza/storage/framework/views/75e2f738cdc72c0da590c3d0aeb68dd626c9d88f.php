<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Nombre Abscisa  :<?php echo e($abscisa->nombre); ?></h3>
			<?php if(count($errors)> 0 ): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($abscisa,['method'=>'PATCH','action'=>['AbscisaController@update',$abscisa->idAbscisa]]); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control"
						value="<?php echo e($abscisa->nombre); ?>" 
						placeholder="Nombre...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" class="form-control"
						value="<?php echo e($abscisa->descripcion); ?>" 
						placeholder="descripcion...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_llenado_teorico">Volumen llenado teorico</label>
						<input type="text" name="volumen_llenado_teorico" class="form-control"
						value="<?php echo e($abscisa->volumen_llenado_teorico); ?>" 
						placeholder="vol...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_excavado_teorico">Volumen llenado teorico</label>
						<input type="text" name="volumen_excavado_teorico" class="form-control"
						value="<?php echo e($abscisa->volumen_excavado_teorico); ?>" 
						placeholder="vol...">
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
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>