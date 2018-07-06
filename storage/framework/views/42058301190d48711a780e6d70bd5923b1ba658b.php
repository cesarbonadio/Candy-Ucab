<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Medios de pago de clientes</h3>
    <a href="medio/createNatural"><button class="btn btn-succes">Añadir Natural</button></a>
    <a href="medio/createJuridico"><button class="btn btn-succes">Añadir Juridico</button></a>
    <?php echo $__env->make('cliente.medio.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
          <th>Tipo</th>
          <th>Número tarjeta</th>
					<th>Marca tarjeta</th>
					<th>Número de cheque</th>
          <th>Cliente Jurídico</th>
          <th>Cliente Natural</th>
          <th>Opciones</th>
				</thead>

                <?php $__currentLoopData = $medio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 <tr>
					<td><?php echo e($m->codigo); ?></td>
					<td><?php echo e($m->tipo); ?></td>
					<td><?php echo e($m->num_tarjeta); ?></td>
					<td><?php echo e($m->marca_tarjeta); ?></td>
					<td><?php echo e($m->num_cheque); ?></td>
					<td><?php echo e($m->rif); ?></td>
          <td><?php echo e($m->cedula); ?></td>
					<td>
						<a href="" data-target="#modal-delete-<?php echo e($m->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

           <?php echo $__env->make('cliente.medio.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</table>
		</div>


	</div>

	<?php echo e($medio->render()); ?>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>