<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h4>Listado de Altertas de inventario (productos que tienen menos de 100 unidades en una tienda)</h4>
    <br>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
          <th>Nombre tienda</th>
          <th>Nombre producto</th>
					<th>Cantidad</th>
					<th>Zona</th>
				</thead>

      <?php $__currentLoopData = $alerta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<tr>
					<td><?php echo e($a->codigo); ?></td>
					<td><?php echo e($a->nombretienda); ?></td>
					<td><?php echo e($a->nombreproducto); ?></td>
					<td><?php echo e($a->cantidad); ?></td>
					<td><?php echo e($a->zona); ?></td>
				</tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>