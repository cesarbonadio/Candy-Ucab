<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Descuentos<a href="descuento/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		<?php echo $__env->make('promocion.descuento.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Porcentaje</th>
					<th>Descripcion</th>
					<th>Producto</th>
					<th>Opciones</th>
				</thead>
                <?php $__currentLoopData = $descuento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($des->codigo); ?></td>
					<td><?php echo e($des->porcentaje); ?></td>
					<td><?php echo e($des->descripcion); ?></td>
					<td><?php echo e($des->producto); ?></td>
					<td>
						<a href="<?php echo e(URL::action('DescuentoController@edit',$des->codigo)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($des->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('promocion.descuento.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>

		<?php echo e($descuento->render()); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>