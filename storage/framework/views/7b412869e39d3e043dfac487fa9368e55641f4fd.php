<?php $__env->startSection('contenido'); ?>


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Top 5 clientes &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
       	  <th><h3>Suma de compras</h3></th>
          <th><h3>Cedula/Rif</h3></th>
          <th><h3>Nombre</h3></th>
					<th><h3>Apellido/D.social</h3></th>
          <th><h3>Hasta</h3></th>
        </thead>
         	<?php $__currentLoopData = $top5Clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <tr>
            <td> <h4 style="text-transform: capitalize;">  <?php echo e($ppt->suma); ?>  </h4></td>
            <td> <h4 style="text-transform: capitalize;">  <?php echo e($ppt->idcliente); ?>  </h4></td>
            <td> <h4>  <?php echo e($ppt->nombre); ?>  </h4></td>
						<td> <h4>  <?php echo e($ppt->apellido); ?>  </h4></td>
						<td> <h4>  <?php echo e($ppt->hasta); ?>  </h4></td>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>