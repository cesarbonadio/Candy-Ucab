<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Clientes Naturales   <a href="natural/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		<?php echo $__env->make('cliente.natural.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Cedula</th>
					<th>RIF</th>
					<th>Correo</th>
					<th>Nro.Carnet</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Lugar</th>
					<th>Tienda</th>
					<th>Opciones</th>
				</thead>
                <?php $__currentLoopData = $naturale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($nat->cedula); ?></td>
					<td><?php echo e($nat->rif); ?></td>
					<td><?php echo e($nat->correo); ?></td>
					<td><?php echo e($nat->num_carnet); ?></td>
					<td><?php echo e($nat->nombre); ?></td>
					<td><?php echo e($nat->apellido); ?></td>
					<td><?php echo e($nat->lugar); ?></td>
					<td><?php echo e($nat->tienda); ?></td>
					<td>
						<a href="<?php echo e(URL::action('NaturalController@edit',$nat->cedula)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($nat->cedula); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

        <?php echo $__env->make('cliente.natural.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
	</div>

		<?php echo e($naturale->render()); ?>

	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>