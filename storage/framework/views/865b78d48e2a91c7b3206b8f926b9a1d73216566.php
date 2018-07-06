<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de privilegios del rol <a href="usuario/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		<?php echo $__env->make('gestion.usuario.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Username</th>
					<th>Password</th>
					<th>Puntos</th>
					<th>Rol</th>
					<th>fk_juridico</th>
					<th>fk_naturale</th>
					<th>fk_empleado</th>
				</thead>
                <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($usu->id); ?></td>
					<td><?php echo e($usu->username); ?></td>
					<td><?php echo e($usu->password); ?></td>
					<td><?php echo e($usu->puntos); ?></td>
					<td><?php echo e($usu->rolnom); ?></td>
					<td><?php echo e($usu->fk_juridico); ?></td>
					<td><?php echo e($usu->fk_naturale); ?></td>
					<td><?php echo e($usu->fk_empleado); ?></td>
					<td>
						<a href="<?php echo e(URL::action('UsuarioController@edit',$usu->id)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($usu->id); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				<?php echo $__env->make('gestion.usuario.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</table>
		</div>

<?php echo e($usuario->appends(Request::except('page'))->render()); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>