<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Todos los presupuestos de clientes</h3>
    <a href="presupuesto/createNatural"><button class="btn btn-succes">Añadir Natural</button></a>
    <a href="presupuesto/createJuridico"><button class="btn btn-succes">Añadir Juridico</button></a>
    <br>
    <?php echo $__env->make('cliente.presupuesto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
          <th>Total acumulado (por pagar)</th>
          <th>Fecha</th>
					<th>Rif (juridico)</th>
          <th>Cedula (natural)</th>
          <th>Usuario</th>
					<th>Tienda compra</th>
          <th>Opciones</th>
				</thead>


            <?php $__currentLoopData = $presupuesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <tr>
					<td><?php echo e($p->codigo); ?></td>
					<td><?php echo e($p->total); ?></td>
					<td><?php echo e($p->fecha); ?></td>
					<td><?php echo e($p->rif); ?></td>
					<td><?php echo e($p->cedula); ?></td>
          <td><?php echo e($p->usuario); ?></td>
					<td><?php echo e($p->tienda_compra); ?></td>
					 <td>
						   <a href="<?php echo e(URL::action('PresupuestoController@edit',$p->codigo)); ?>"><button class="btn btn-info">Agregar productos</button></a>
					 </td>
				  </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>

	<?php echo e($presupuesto->render()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>