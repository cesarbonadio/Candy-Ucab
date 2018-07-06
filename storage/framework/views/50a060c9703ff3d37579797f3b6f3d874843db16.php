<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de privilegios del rol <a href="rolprivilegio/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		<?php echo $__env->make('gestion.rolprivilegio.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Rol</th>
					<th>Descripcion de privilegio</th>
				</thead>
                <?php $__currentLoopData = $rolprivilegio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($rp->codigo); ?></td>
					<td><?php echo e($rp->rdes); ?></td>

					<td><?php echo e($rp->pdes); ?></td>
					<td>
						<a href="<?php echo e(URL::action('RolPrivilegioController@edit',$rp->codigo)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($rp->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				<?php echo $__env->make('gestion.rolprivilegio.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</table>
		</div>

<?php echo e($rolprivilegio->appends(Request::except('page'))->render()); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>