<?php $__env->startSection('contenido'); ?>

<a href="../reporte"><button class="btn btn-success">Volver</button></a>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Puntos canjeados y otorgados por tienda y lugar &nbsp; &nbsp; </h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover" align="center">

        <thead>
          <th><h3>Nombre tienda</h3></th>
          <th><h3>Canjeado</h3></th>
          <th><h3>Lugar</h3></th>
        </thead>

     <?php $__currentLoopData = $canjeados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
					 <td> <h4>  <?php echo e($c->nombre_tienda); ?>  </h4> </td>
           <td> <h4>  <?php echo e($c->canjeados); ?>  </h4> </td>
           <td> <h4>  <?php echo e($c->nombre_lugar); ?>  </h4> </td>
         </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <br>

        <thead>
          <th><h3>Nombre Tienda</h3></th>
          <th><h3>Otorgado</h3></th>
          <th><h3>Lugar</h3></th>
        </thead>

     <?php $__currentLoopData = $otorgados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
           <td> <h4>  <?php echo e($o->nombre_tienda); ?>  </h4> </td>
           <td> <h4>  <?php echo e($o->otorgado); ?>  </h4> </td>
           <td> <h4>  <?php echo e($o->nombre_lugar); ?>  </h4> </td>
         </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
</div>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>