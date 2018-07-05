<?php $__env->startSection('contenido'); ?>

<a href="../reporte"><button class="btn btn-success">Volver</button></a>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Ranking de productos por tienda y lugar &nbsp; &nbsp; </h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover" align="center">

        <thead>
          <th><h3>Nombre tienda</h3></th>
          <th><h3>Nombre producto</h3></th>
          <th><h3>Cantidad vendidos</h3></th>
        </thead>

     <?php $__currentLoopData = $tienda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
           <td> <h4>  <?php echo e($t->tienda_nombre); ?>  </h4> </td>
           <td> <h4>  <?php echo e($t->nombre_producto); ?>  </h4> </td>
           <td> <h4>  <?php echo e($t->cantidad_vendida); ?>  </h4> </td>
         </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <br>
        <thead>
          <th><h3>Nombre Lugar</h3></th>
          <th><h3>Lugar Codigo</h3></th>
          <th><h3>Nombre producto</h3></th>
          <th><h3>Cantidad vendidoss</h3></th>
        </thead>

     <?php $__currentLoopData = $lugar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
           <td><h4> <?php echo e($l->lugar_nombre); ?> </h4></td>
           <td><h4> <?php echo e($l->lugar_codigo); ?> </h4></td>
           <td><h4> <?php echo e($l->nombre_producto); ?> </h4></td>
           <td><h4> <?php echo e($l->cantidad_vendida); ?> </h4></td>
         </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>