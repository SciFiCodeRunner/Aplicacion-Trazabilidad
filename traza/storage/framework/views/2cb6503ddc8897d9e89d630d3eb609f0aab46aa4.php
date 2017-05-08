	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Listado de Abscisas                                                                   <a href="abscisas/create"><button class="btn btn-success">Nueva Abscisa</button> 
			</a></h3>

			<?php echo $__env->make('traza.abscisas.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<TR>
						
							<th rowspan="1">Nombre</th>
							<th colspan="2">Vol/Diseño</th>
							<th colspan="2">Vol/Transportado</th>
							<th colspan="2">Vol/Obra</th>
							<th colspan="2">Coef/Teorico</th>
								<th colspan="1">Coef/Material</th>
								<th colspan="2">Coef/Real</th>
								<th colspan="2">Vol/compacto</th>

							<th rowspan="1">Opciones</th>
						</TR>
						<TR>
							<th></th>
							<TH>lleno</TH> <TH>corte</TH> 
							<TH>lleno</TH> <TH>corte</TH> 
							<TH>lleno</TH>
							<TH>corte</TH>
							<TH>lleno</TH> <TH>corte</TH> 
							<TH>compacto</TH> <TH>lleno</TH> 
							<TH>corte</TH> 
							 <TH>lleno</TH> <TH>corte</TH> 
							
						</TR>
					</thead>
					<?php $__currentLoopData = $abscisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						
						<td><?php echo e($abs->nombre); ?></td>
   						<!--volumen teorico-->
						<td><?php echo e($abs->volumen_llenado_teorico); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumen_excavado_teorico); ?> <?php echo e('M3'); ?></td>
						<!--volumen transportado-->
						<td><?php echo e($abs->volumenLlenado); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumenExcavado); ?> <?php echo e('M3'); ?></td>

						<!--volumenCompactoTransportado-->


						<!--volumen en obra-->
						<td><?php echo e($abs->volumen_llenado_obra); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->volumen_excavado_obra); ?> <?php echo e('M3'); ?></td>
						<!--coeficiente/teorico LLeno-->
                        <?php if($abs->volumenLlenado==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0): ?>
                        <td><?php echo e($abs->volumen_llenado_teorico); ?> <?php echo e('M3'); ?></td>
						<?php elseif($abs->volumenLlenado/$abs->volumen_llenado_teorico>=1.25||$abs->volumenLlenado/$abs->volumen_llenado_teorico <= 1.35): ?>
						<td id="color1" ><?php echo e(round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)); ?> <?php echo e('M3'); ?></td>
						<?php else: ?>
						<td><?php echo e(round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)); ?> <?php echo e('M3'); ?></td>
						<?php endif; ?>
						<!--ccoeficiente teorico Excavado-->
                        <?php if($abs->volumenExcavado==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0): ?>
                         <td><?php echo e($abs->volumen_excavado_teorico); ?> <?php echo e('M3'); ?></td>
						<?php elseif($abs->volumenExcavado/$abs->volumen_excavado_teorico>1.35||$abs->volumenExcavado/$abs->volumen_excavado_teorico < 1.25): ?>
						<td id="color1" ><?php echo e(round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)); ?> <?php echo e('M3'); ?></td>
						<?php else: ?>
						<td><?php echo e(round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)); ?> <?php echo e('M3'); ?></td>
						<?php endif; ?>

						<!--coeficiente MaterialCompacto-->
						<td id="color2" ><?php echo e(round($abs->volumenLlenado/1.3,2)); ?></td>

<!--coeficiente/real corte-->
						 <?php if($abs->volumenExcavado||$abs->volumen_excavado_obra==0.00||$abs->volumenExcavado==0.00||$abs->volumenExcavado==0||$abs->volumenExcavado==0.0): ?>
                         <td><?php echo e($abs->volumen_excavado_obra); ?> <?php echo e('M3'); ?></td>
						<?php else: ?>
						<td><?php echo e(round($abs->volumen_excavado_obra/$abs->volumenExcavado,2)); ?> <?php echo e('M3'); ?></td>
						<?php endif; ?>

						 <?php if($abs->volumenLlenado||$abs->volumen_llenado_obra==0.00||$abs->volumenLlenado=0.00||$abs->volumenLlenado==0||$abs->volumenLlenado==0.0): ?>
                         <td><?php echo e($abs->volumen_llenado_obra); ?> <?php echo e('M3'); ?></td>
                         <?php else: ?>
						<td><?php echo e(round($abs->volumen_llenado_obra/$abs->volumenLlenado,2)); ?> <?php echo e('M3'); ?></td>
						<?php endif; ?>
						



						<td ><?php echo e(($abs->volumenLlenado-$abs->volumen_llenado_obra)); ?></td>
						<td ><?php echo e(($abs->volumenExcavado-$abs->volumen_excavado_obra)); ?></td>
						<td>
							<?php echo Form::open(array('url'=>'traza/abscisas','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>

							<a href=""><button type="submit" class="btn btn" value="<?php echo e($abs->idAbscisa); ?>" name="searchText" ">Detalle</button></a>	
							<?php echo e(Form:: close()); ?>


							<a href="<?php echo e(URL::action('AbscisaController@edit',$abs->idAbscisa)); ?>">
								<button class="btn btn-info">Editar</button></a>

								<a href="" data-target="#modal-delete-<?php echo e($abs->idAbscisa); ?>" data-toggle="modal">
									<button class="btn btn-danger" name="eliminar">Eliminar</button></a>
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