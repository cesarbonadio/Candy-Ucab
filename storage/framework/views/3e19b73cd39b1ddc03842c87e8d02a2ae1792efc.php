<?php $__env->startSection('contenido'); ?>


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Empleados &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Cédula</h3></th>
          <th><h3>Nombre</h3></th>
          <th><h3>Horas trabajadas</h3></th>
          <th><h3>Promedio entrada</h3></th>
          <th><h3>Promedio salida</h3></th>
          <th><h3>Días con retardo</h3></th>
          <th><h3>Días de ausencia</h3></th>
        </thead>


       <?php for($i=0; $i<=sizeof($empleado)-1; $i++): ?>
         <tr>
           <td> <h4>  <?php echo e($empleado[$i]->cedula); ?>  </h4> </td>
           <td> <h4>  <?php echo e($empleado[$i]->nombre); ?>  </h4> </td>
           <td> <h4>  <?php echo e($empleado[$i]->horas); ?>  </h4> </td>
           <td> <h4>  <?php echo e($empleado[$i]->promedio); ?>  </h4> </td>
           <td> <h4>  <?php echo e($empleado[$i]->promedioS); ?>  </h4> </td>
           

         </tr>
       <?php endfor; ?>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>