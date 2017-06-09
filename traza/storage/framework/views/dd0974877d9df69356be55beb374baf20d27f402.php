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
				Información General Abscisa </font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover ">
					<!--http://musicforprogramming.net/-->
					<?php $__currentLoopData = $abscisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<thead >
						<TR class="bg-info" >

							<th colspan="1" style="text-align:center">Abscisa</th>
							<th colspan="2" style="text-align:center">Vol/Diseño</th>
							<th colspan="2" style="text-align:center">Vol/Transportado</th>
							<th colspan="2" style="text-align:center">Vol/Ejecutado</th>
							<th colspan="2" style="text-align:center">Vol/compacto</th>
						</TR>
						<TR  class="bg-success">
							<th></th>

							<TH style="text-align:center">corte</TH> 
							<TH style="text-align:center">lleno</TH> 
							<TH style="text-align:center">corte</TH>
							<TH style="text-align:center">lleno</TH>
							<TH style="text-align:center">corte</TH>
							<TH style="text-align:center">lleno</TH> 
							<TH style="text-align:center">corte</TH> 
							<TH style="text-align:center">lleno</TH> 


						</TR>
					</thead>
					<tr style="text-align:center">

						<td ><?php echo e($abs->nombre); ?></td>
						<!--volumen teorico-->
						<td><?php echo e($abs->volumen_excavado_teorico); ?> mᶟ </td>
						<td><?php echo e($abs->volumen_llenado_teorico); ?> mᶟ </td>
						
						<!--volumen transportado-->

						<td><?php echo e($abs->volumenExcavado); ?> mᶟ  </td>
						<td><?php echo e($abs->volumenLlenado); ?> mᶟ </td>

						<!--volumen en obra-->
						<td><?php echo e($abs->volumen_excavado_obra); ?> mᶟ </td>
						<td><?php echo e($abs->volumen_llenado_obra); ?> mᶟ </td>

						<!--volumen compacto-->
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
						<th colspan="2" style="text-align:center">corte</th>
						<th colspan="2" style="text-align:center">lleno</th>
						<th colspan="2" style="text-align:center">corte</th>
						<th colspan="2" style="text-align:center">lleno</th>
						<th colspan="2"></th>
					</tr>

					<tr style="text-align:center">
						
						<!--ccoeficiente teorico Excavado-->
						<td></td>
						<?php if($abs->volumenExcavado==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0): ?>
						<td colspan="2"><?php echo e($abs->volumen_excavado_teorico); ?> mᶟ </td>
						<?php elseif($abs->volumenExcavado/$abs->volumen_excavado_teorico>1.35||$abs->volumenExcavado/$abs->volumen_excavado_teorico < 1.25): ?>
						<td id="color1" colspan="2"><?php echo e(round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($abs->volumenExcavado/$abs->volumen_excavado_teorico,2)); ?> mᶟ </td>
						<?php endif; ?>


						<!--coeficiente/teorico LLeno-->
						
						<?php if($abs->volumenLlenado==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0): ?>
						<td colspan="2"><?php echo e($abs->volumenLlenado); ?> mᶟ </td>
						<?php elseif($abs->volumenLlenado/$abs->volumen_llenado_teorico>1.35||$abs->volumenLlenado/$abs->volumen_llenado_teorico < 1.25): ?>
						<td id="color1" colspan="2"><?php echo e(round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($abs->volumenLlenado/$abs->volumen_llenado_teorico,2)); ?> mᶟ </td>
						<?php endif; ?>



						<!--coeficienteRealLLeno-->

						<?php if($abs->volumenExcavado==0||$abs->coef_real_llenado==0||$abs->coef_real_llenado==0.0||$abs->coef_real_llenado==0.00||$abs->volumenExcavado==0.00||$abs->volumenExcavado==0.0): ?>
						<td colspan="2"><?php echo e($abs->volumenExcavado); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($abs->coef_real_llenado/$abs->volumenExcavado,2)); ?> mᶟ </td>
						<?php endif; ?>
						<!--coeficiente/real corte-->

						<?php if($abs->volumenLlenado==0||$abs->coef_real_excavado==0||$abs->coef_real_excavado==0.0||$abs->volumenLlenado==0.00||$abs->volumenLlenado==0.0): ?>
						<td colspan="2"><?php echo e($abs->volumenLlenado); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($abs->coef_real_excavado/$abs->volumenLlenado,2)); ?> mᶟ</td>
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
			<h4  style="text-align:center" ><font color="red">Resumen Materiales De Lleno</font></h4>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class= "table table-striped table-bordered table-condensed table-hover">
						<thead class="bg-warning">
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

			<h4 align="center"><font color="red">
				Información Material Terraplen y Material Comun</font></h4>
				<table class= "table table-striped table-bordered table-condensed table-hover ">
					<!--http://musicforprogramming.net/-->
					<?php $__currentLoopData = $abscisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<thead >
						<TR class="bg-info" >
							<th colspan="1" style="text-align:center">Abscisa</th>
							<th colspan="2" style="text-align:center">Vol/Diseño</th>
							<th colspan="2" style="text-align:center">Vol/Transportado</th>
							<th colspan="2" style="text-align:center">Vol/Ejecutado</th>
							<th colspan="2" style="text-align:center">Vol/compacto</th>
						</TR>
						<TR  class="bg-success">
							<th></th>

							<TH style="text-align:center">corte</TH> 
							<TH style="text-align:center">lleno</TH> 
							<TH style="text-align:center">corte/Material Comun</TH>
							<TH style="text-align:center">lleno/Terraplen</TH>
							<TH style="text-align:center">corte</TH>
							<TH style="text-align:center">lleno</TH> 
							<TH style="text-align:center">corte</TH> 
							<TH style="text-align:center">lleno</TH> 


						</TR>
					</thead>
					<tr style="text-align:center">

						<td ><?php echo e($abs->nombre); ?></td>
						<!--volumen teorico-->
						<td><?php echo e($abs->volumen_excavado_teorico); ?> mᶟ </td>
						<td><?php echo e($abs->volumen_llenado_teorico); ?> mᶟ </td>

						<!--volumen transportado COLLECTION2-->
						<td><?php echo e($Terraplen); ?> mᶟ</td>
						<td><?php echo e($Comun); ?> mᶟ</td>

						

						<!--volumen en obra-->
						<td><?php echo e($abs->volumen_excavado_obra); ?> mᶟ </td>
						<td><?php echo e($abs->volumen_llenado_obra); ?> mᶟ </td>
						

						<!--volumen compacto-->
						<td ><?php echo e(($Comun-$abs->volumen_llenado_obra)); ?></td>
						<td ><?php echo e(($Terraplen-$abs->volumen_excavado_obra)); ?></td>

					</tr>
					<TR>
						<th colspan="1"></th>
						<th colspan="4" style="text-align:center">Coef/Teorico</th>
						<th colspan="4" style="text-align:center">Coef/Real</th>
						<th colspan="4" style="text-align:center"></th>
					</TR>
					<tr>
						<th colspan="1"></th>
						<th colspan="2" style="text-align:center">corte</th>
						<th colspan="2" style="text-align:center">lleno</th>
						<th colspan="2" style="text-align:center">corte</th>
						<th colspan="2" style="text-align:center">lleno</th>
						<th colspan="2"></th>
					</tr>

					<tr style="text-align:center">
					<td></td>
						<!--ccoeficiente teorico Excavado-->
						<?php if($Terraplen==0||$abs->volumen_excavado_teorico==0.00||$abs->volumen_excavado_teorico==0||$abs->volumen_excavado_teorico==0.0): ?>
						<td colspan="2"><?php echo e($abs->volumen_excavado_teorico); ?> mᶟ </td>
						<?php elseif($Terraplen/$abs->volumen_excavado_teorico>1.35||$Terraplen/$abs->volumen_excavado_teorico < 1.25): ?>
						<td id="color1" colspan="2"><?php echo e(round($Terraplen/$abs->volumen_excavado_teorico,2)); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($Terraplen/$abs->volumen_excavado_teorico,2)); ?> mᶟ </td>
						<?php endif; ?>
	<!--coeficiente/teorico LLeno-->
						
						<?php if($Comun==0||$abs->volumen_llenado_teorico==0.00||$abs->volumen_llenado_teorico==0||$abs->volumen_llenado_teorico==0.0): ?>
						<td colspan="2"><?php echo e($Comun); ?> mᶟ </td>
						<?php elseif($Comun/$abs->volumen_llenado_teorico>1.35||$Comun/$abs->volumen_llenado_teorico < 1.25): ?>
						<td id="color1" colspan="2"><?php echo e(round($Comun/$abs->volumen_llenado_teorico,2)); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($Comun/$abs->volumen_llenado_teorico,2)); ?> mᶟ </td>
						<?php endif; ?>


						<!--coeficienteRealLLeno-->
						<?php if($Terraplen==0||$abs->coef_real_llenado==0||$abs->coef_real_llenado==0.0||$abs->coef_real_llenado==0.00||$Terraplen==0.00||$Terraplen==0.0): ?>
						<td colspan="2"><?php echo e($Terraplen); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($abs->coef_real_llenado/$Terraplen,2)); ?> mᶟ </td>
						<?php endif; ?>
						<!--coeficiente/real corte-->

						<?php if($Comun==0||$abs->coef_real_excavado==0||$abs->coef_real_excavado==0.0||$Comun==0.00||$Comun==0.0): ?>
						<td colspan="2"><?php echo e($Comun); ?> mᶟ </td>
						<?php else: ?>
						<td colspan="2"><?php echo e(round($abs->coef_real_excavado/$Comun,2)); ?> mᶟ</td>
						<?php endif; ?>

					</tr>
					<tr>
						<th></th>
						<th colspan="8" style="text-align:center">Coef/Material(compacto)</th>
					</tr>
					<th></th>
					<!--coeficiente MaterialCompacto-->
					<td id="color2" colspan="8" style="text-align:center"><?php echo e(round($Comun/1.3,2)); ?></td>
				</tr>
				<?php echo $__env->make('traza.abscisas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>	
			
			<h4 style="text-align:center" ><font color="red">Trazabilidad Lleno</font></h4>	<table class= "table table-striped table-bordered table-condensed table-hover">
			<thead class="bg-success">
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
				<td><?php echo e($abs->cantidadMaterial); ?> 
					mᶟ </td>
					<td><?php echo e($abs->matnombre); ?>



					</td>


				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>	


			<h4 style="text-align:center" ><font color="red">Trazabilidad Corte</font></h4>
			<table class= "table table-striped table-bordered table-condensed table-hover">
				<thead class="bg-success">
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
					<td><?php echo e($abs->cantidadMaterial); ?> 
						mᶟ </td>
						<td><?php echo e($abs->matnombre); ?>

						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>	
				<?php echo e($abscisa1->render()); ?>

				<?php echo e($abscisa2->render()); ?>

			</div>



		</div>
	</div>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>