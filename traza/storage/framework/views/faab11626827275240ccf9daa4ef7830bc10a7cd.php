		
		<?php $__env->startSection('contenido'); ?>
		<div class="row">
			<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

				<h3>Abscisas De Proyecto <br>   <br>                                                                                 <a href="abscisas/create"><button class="btn btn-success">Nueva Abscisa</button> <a href="<?php echo e(URL::to('createCantera')); ?>"><button class="btn btn-success">Nueva Cantera</button> 				</a></h3>


			</div>
		</div>
		<div class= "row" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class= "table table-striped table-bordered table-condensed table-hover ">
						<!--http://musicforprogramming.net/-->
						<?php $__currentLoopData = $abscisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<thead >
							<TR class="bg-info" >

								<th colspan="1" style="text-align:center">Abscisa</th>
								<th colspan="2" style="text-align:center">Vol/Diseño</th>
								<th colspan="2" style="text-align:center">Vol/Transportado Total</th>
								<th colspan="2" style="text-align:center">Vol/Ejecutado</th>
							
								<th rowspan="1" style="text-align:center">Opciones</th>
							</TR>
							<TR  class="bg-success">
								<th><?php echo e($abs->nombre); ?></th>
								
								<TH style="text-align:center">corte</TH>
								<TH style="text-align:center">lleno</TH> 
								<TH style="text-align:center">corte</TH>
								<TH style="text-align:center">lleno</TH>
								<TH style="text-align:center">corte</TH>
								<TH style="text-align:center">lleno</TH> 
								
								<th style="text-align:center">  

									<?php echo Form::open(array('url'=>'traza/abscisas','method'=>'GET','autocomplete'=>'off','role'=>'search')); ?>

									<div class="btn-group">

										<a href=""><button type="submit" class="btn btn" value="<?php echo e($abs->idAbscisa); ?>" name="searchText" ">Detalle</button></a>

										<?php echo e(Form:: close()); ?>


									</div>


								</th>
								
								
							</TR>
						</thead>
						<tr style="text-align:center">
							
							<td></td>
							<!--volumen teorico-->
							<td><?php echo e($abs->volumen_excavado_teorico); ?> mᶟ </td>
							<td><?php echo e($abs->volumen_llenado_teorico); ?> mᶟ </td>

							<!--volumen transportado-->

							<td><?php echo e($abs->volumenLlenado); ?> mᶟ </td>
							<td><?php echo e($abs->volumenExcavado); ?> mᶟ  </td>
							
							<!--volumen en obra-->
							<td><?php echo e($abs->volumen_excavado_obra); ?> mᶟ </td>
							<td><?php echo e($abs->volumen_llenado_obra); ?> mᶟ </td>
							
							<!--volumen compacto-->
						
							<td>
								<a href= "<?php echo e(URL::action('AbscisaController@edit',$abs->idAbscisa)); ?>"  >
									<button class="btn btn-info">Editar</button></a>

									<a href="" data-target="#modal-delete-<?php echo e($abs->idAbscisa); ?>" data-toggle="modal">
										<button class="btn btn-danger" name="eliminar">Eliminar</button></a></td>


									</tr>


									<?php echo $__env->make('traza.abscisas.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</table>	
							</div>

						</div>
					</div>

					<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>