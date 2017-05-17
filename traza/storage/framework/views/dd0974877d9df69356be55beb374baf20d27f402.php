	
	<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<h3>Detalle Abscisas </h3> <a href="http://localhost:8000/traza/abscisas"><button class="btn btn-success">Retornar</button></a>
		</div>
	</div>
	<div class= "row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
		<h4 align="center"><font color="red">
		Informacion General</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<?php $__currentLoopData = $abscisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<thead >
							<TR class="bg-info" >

								<th colspan="1" style="text-align:center">Abscisa</th>
								<th colspan="2" style="text-align:center">Vol/Diseño</th>
								<th colspan="2" style="text-align:center">Vol/Transportado</th>
								<th colspan="2" style="text-align:center">Vol/Obra</th>

								<th colspan="2" style="text-align:center">Vol/compacto</th>
						
							</TR>
							<TR  class="bg-success">
								<th></th>
								
								<TH style="text-align:center">lleno</TH> <TH style="text-align:center">corte</TH> 
								<TH style="text-align:center">lleno</TH>
								<TH style="text-align:center">corte</TH>
								<TH style="text-align:center">lleno</TH> <TH style="text-align:center">corte</TH> 
								<TH style="text-align:center">lleno</TH> 
								<TH style="text-align:center">corte</TH> 
								
								
							</TR>
						</thead>
						<tr style="text-align:center">
							
							<td ><?php echo e($abs->nombre); ?></td>
							<!--volumen teorico-->
							<td><?php echo e($abs->volumen_llenado_teorico); ?> <?php echo e('M3'); ?></td>
							<td><?php echo e($abs->volumen_excavado_teorico); ?> <?php echo e('M3'); ?></td>
							<!--volumen transportado-->
							<td><?php echo e($abs->volumenLlenado); ?> <?php echo e('M3'); ?></td>
							<td><?php echo e($abs->volumenExcavado); ?> <?php echo e('M3'); ?> </td>

							<!--volumenCompactoTransportado-->


							<!--volumen en obra-->
							<td><?php echo e($abs->volumen_llenado_obra); ?> <?php echo e('M3'); ?></td>
							<td><?php echo e($abs->volumen_excavado_obra); ?> <?php echo e('M3'); ?></td>
							

							<td ><?php echo e(($abs->volumenLlenado-$abs->volumen_llenado_obra)); ?></td>
							<td ><?php echo e(($abs->volumenExcavado-$abs->volumen_excavado_obra)); ?></td>
							
								</tr>
								<TR>
									<th colspan="1"></th>
									<th colspan="4" style="text-align:center">Coef/Teorico</th>
									<th colspan="4" style="text-align:center">Coef/Real</th>
									<th colspan="4" style="text-align:center"></th>
								</TR>
								<tr>
									<th colspan="1"></th>
									<th colspan="2" style="text-align:center">lleno</th>
									<th colspan="2" style="text-align:center">excavado</th>
									<th colspan="2" style="text-align:center">lleno</th>
									<th colspan="2" style="text-align:center">excavado</th>
									<th colspan="2"></th>
								</tr>

								<tr style="text-align:center">
									<!--coeficiente/teorico LLeno-->
									<td></td>
									<?php if($abs->volumenLlenado==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0): ?>
									<td colspan="2"><?php echo e($abs->volumen_llenado_teorico); ?> <?php echo e('M3'); ?></td>
									<?php elseif($abs->volumenLlenado/$abs->volumen_llenado_teorico>=1.25||$abs->volumenLlenado/$abs->volumen_llenado_teorico <= 1.35): ?>
									<td id="color1" colspan="2"><?php echo e(round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)); ?> <?php echo e('M3'); ?></td>
									<?php else: ?>
									<td colspan="2"><?php echo e(round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)); ?> <?php echo e('M3'); ?></td>
									<?php endif; ?>
									<!--ccoeficiente teorico Excavado-->
									<?php if($abs->volumenExcavado==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0): ?>
									<td colspan="2"><?php echo e($abs->volumen_excavado_teorico); ?> <?php echo e('M3'); ?></td>
									<?php elseif($abs->volumenExcavado/$abs->volumen_excavado_teorico>1.35||$abs->volumenExcavado/$abs->volumen_excavado_teorico < 1.25): ?>
									<td id="color1" colspan="2"><?php echo e(round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)); ?> <?php echo e('M3'); ?></td>
									<?php else: ?>
									<td colspan="2"><?php echo e(round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)); ?> <?php echo e('M3'); ?></td>
									<?php endif; ?>

									<!--coeficiente/real corte-->
									<?php if($abs->volumenExcavado||$abs->volumen_excavado_obra==0.00||$abs->volumenExcavado==0.00||$abs->volumenExcavado==0||$abs->volumenExcavado==0.0): ?>
									<td colspan="2"><?php echo e($abs->volumen_excavado_obra); ?> <?php echo e('M3'); ?></td>
									<?php else: ?>
									<td colspan="2"><?php echo e(round($abs->volumen_excavado_obra/$abs->volumenExcavado,2)); ?> <?php echo e('M3'); ?></td>
									<?php endif; ?>

									<?php if($abs->volumenLlenado||$abs->volumen_llenado_obra==0.00||$abs->volumenLlenado=0.00||$abs->volumenLlenado==0||$abs->volumenLlenado==0.0): ?>
									<td colspan="2"><?php echo e($abs->volumen_llenado_obra); ?> <?php echo e('M3'); ?></td>
									<?php else: ?>
									<td colspan="2"><?php echo e(round($abs->volumen_llenado_obra/$abs->volumenLlenado,2)); ?> <?php echo e('M3'); ?></td>
									<?php endif; ?>

								</tr>
								<tr>
									<th></th>
									<th colspan="8" style="text-align:center">Coef/Material(compacto)</th>
								</tr>
								<th></th>
								<!--coeficiente MaterialCompacto-->
								<td id="color2" colspan="8" style="text-align:center"><?php echo e(round($abs->volumenLlenado/1.3,2)); ?></td>
							</tr>
							<?php echo $__env->make('traza.abscisas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>	
						
						<h4 ><font color="red">Lleno</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>#Recibo</th>
						<th>Placa</th>
						<th>Cantidad Material</th>	
						<th>Material</th>
					</thead>
					<?php $__currentLoopData = $abscisa2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->fecha); ?></td>
						<td><?php echo e($abs->numeroRecibo); ?></td>
						<td><?php echo e($abs->placa); ?></td>
						<td><?php echo e($abs->cantidadMaterial); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->matnombre); ?>

						</td>

						
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
				

                <h4 ><font color="red">Corte</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>#Recibo</th>
						<th>Placa</th>
						<th>Cantidad Material</th>	
						<th>Material</th>
					</thead>
					<?php $__currentLoopData = $abscisa1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($abs->nombre); ?></td>
						<td><?php echo e($abs->fecha); ?></td>
						<td><?php echo e($abs->numeroRecibo); ?></td>
						<td><?php echo e($abs->placa); ?></td>
						<td><?php echo e($abs->cantidadMaterial); ?> <?php echo e('M3'); ?></td>
						<td><?php echo e($abs->matnombre); ?>

						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
				<?php echo e($abscisa1->render()); ?>

				<?php echo e($abscisa2->render()); ?>

					<?php echo e($abscisa->render()); ?>

			</div>
			
			
		
		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>