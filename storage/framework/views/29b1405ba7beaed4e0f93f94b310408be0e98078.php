<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Contactos de clientes jurídicos  <a href="contacto/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
    <?php echo $__env->make('cliente.contacto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Cedula</th>
          <th>Nombre</th>
          <th>Apellido</th>
					<th>Función</th>
          <th>Cliente Jurídico</th>
          <th>Rif Cliente Jurídico</th>
          <th>Opciones</th>
				</thead>

                <?php $__currentLoopData = $contacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($c->cedula); ?></td>
					<td><?php echo e($c->nombre); ?></td>
					<td><?php echo e($c->apellido); ?></td>
					<td><?php echo e($c->funcion); ?></td>
					<td><?php echo e($c->dsocial); ?></td>
          <td><?php echo e($c->rif); ?></td>
					<td>
						<a href="<?php echo e(URL::action('ContactoController@edit',$c->cedula)); ?>"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-<?php echo e($c->cedula); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				<?php echo $__env->make('cliente.contacto.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</table>
		</div>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>