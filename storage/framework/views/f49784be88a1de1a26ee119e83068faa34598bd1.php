<?php $__env->startSection('contenido'); ?>
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Clientes Frecuentes Por Tienda En Un Periodo de Tiempo</h3><a href="../reporte"><button class="btn btn-success">Volver</button></a></pre>
		<?php echo $__env->make('reporte.search_clientes_frecuentes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Rif o Cédula</th>
					<th>Nombre o Denominacion social</th>
					<th>Tienda</th>
					<th>Compras</th>
					
				</thead>
                <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($clie->id); ?></td>
					<td><?php echo e($clie->nombre); ?></td>
					<td><?php echo e($clie->tienda); ?></td>
					<td><?php echo e($clie->compra); ?></td>
					
				</tr>

        

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
	</div>
     
	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>