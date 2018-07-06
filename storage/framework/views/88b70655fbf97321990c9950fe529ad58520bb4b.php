<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Diario<a href="diario/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		<?php echo $__env->make('promocion.diario.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Fecha de Emision</th>
					<th>Fecha de vencimiento</th>
				</thead>
                <?php $__currentLoopData = $diario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($dia->codigo); ?></td>
					<td><?php echo e($dia->descripcion); ?></td>
					<td><?php echo e($dia->fecha_emision); ?></td>
					<td><?php echo e($dia->fecha_emision); ?></td>

					<td>
						<a href="<?php echo e(URL::action('DiarioController@edit',$dia->codigo)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($dia->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('promocion.diario.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>

		<?php echo e($diario->render()); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>