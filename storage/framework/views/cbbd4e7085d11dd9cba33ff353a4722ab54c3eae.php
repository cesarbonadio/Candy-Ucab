<?php $__env->startSection('contenido'); ?>


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Metodo de pago más usado &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
       	  <th><h3>Cantidad comprado</h3></th>
          <th><h3>Cedula/Rif</h3></th>
          <th><h3>Veces comprado</h3></th>
        </thead>
         	<?php $__currentLoopData = $top5Clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <tr>
            <td> <h4 style="text-transform: capitalize;">  <?php echo e($t5->suma); ?>  </h4></td>
            <td> <h4 style="text-transform: capitalize;">  <?php echo e($t5->idcliente); ?>  </h4></td>
            <td> <h4 style="text-transform: capitalize;">  <?php echo e($t5->nombre); ?>  <?php echo e($t5->apellido); ?></h4></td>

         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>