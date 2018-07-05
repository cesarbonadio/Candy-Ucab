<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Clientes Juridicos  <a href="juridico/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		<?php echo $__env->make('cliente.juridico.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>RIF</th>
					<th>Nro.Carnet</th>
					<th>Correo</th>
					<th>D.Social</th>
					<th>R.Social</th>
					<th>Pagina Web</th>
					<th>Capital</th>
					<th>Lugar</th>
					<th>Lugar Fiscal</th>
					<th>Tienda</th>
					<th>Opciones</th>
				</thead>
                <?php $__currentLoopData = $juridico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($jur->rif); ?></td>
					<td><?php echo e($jur->num_carnet); ?></td>
					<td><?php echo e($jur->correo); ?></td>
					<td><?php echo e($jur->d_social); ?></td>
					<td><?php echo e($jur->r_social); ?></td>
					<td><?php echo e($jur->pagina_web); ?></td>
					<td><?php echo e($jur->capital); ?></td>
					<td><?php echo e($jur->lugar); ?></td>
					<td><?php echo e($jur->lugarf); ?></td>
					<td><?php echo e($jur->tienda); ?></td>
					<td>
						<a href="<?php echo e(URL::action('JuridicoController@edit',$jur->rif)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($jur->rif); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				<?php echo $__env->make('cliente.juridico.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</table>
		</div>

<?php echo e($juridico->render()); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>