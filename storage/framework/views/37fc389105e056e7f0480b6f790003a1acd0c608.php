<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Diario<a href="diario_descuento/create"><button class="btn btn-succes">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Codigo del Diario</th>
					<th>Descripcion del diario</th>
					<th>Codigo del Descuento</th>
					<th>Descripcion del descuento</th>
				</thead>
                <?php $__currentLoopData = $diario_descuento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($dd->codigo); ?></td>
					<td><?php echo e($dd->c_diario); ?></td>
					<td><?php echo e($dd->ddes); ?></td>
					<td><?php echo e($dd->c_descuento); ?></td>
					<td><?php echo e($dd->dedes); ?></td>

					<td>
						<a href="<?php echo e(URL::action('Diario_DescuentoController@edit',$dd->codigo)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($dd->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('promocion.diario_descuento.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>

		<?php echo e($diario_descuento->render()); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>