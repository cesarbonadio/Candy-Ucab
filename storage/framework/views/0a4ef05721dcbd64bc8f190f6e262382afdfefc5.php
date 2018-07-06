<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de reposiciones a la fabrica<a href="contacto/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
          <th>Fecha</th>
          <th>Codigo presupuesto</th>
					<th>Total</th>
          <th>Estatus</th>
				</thead>

                <?php $__currentLoopData = $pedido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($p->codigo); ?></td>
					<td><?php echo e($p->fecha); ?></td>
					<td><?php echo e($p->c_presupuesto); ?></td>
					<td><?php echo e($p->total); ?></td>
					<td><?php echo e($p->descripcion); ?></td>

					<td>
						<a href="<?php echo e(URL::action('ReposicionController@edit',$p->codigo)); ?>"><button class="btn btn-info">Cambiar Estatus</button></a>
					</td>
				</tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>