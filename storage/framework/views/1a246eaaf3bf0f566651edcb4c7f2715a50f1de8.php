<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Asistencia de los empleados &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Hora de entrada</h3></th>
          <th><h3>Hora de salida</h3></th>
          <th><h3>Cédula</h3></th>
          <th><h3>Nombre</h3></th>
          <th><h3>Apellido</h3></th>
          <th><h3>Cargo</h3></th>
        </thead>


       <?php for($i=0; $i<=sizeof($asistencia)-1; $i++): ?>
         <tr>
           <td> <h4>  <?php echo e($asistencia[$i]->hora_entrada); ?>  </h4> </td>
           <td> <h4>  <?php echo e($asistencia[$i]->hora_salida); ?></h4> </td>
           <td> <h4>  <?php echo e($asistencia[$i]->cedula); ?></h4> </td>
           <td> <h4>  <?php echo e($asistencia[$i]->nombre); ?></h4> </td>
           <td> <h4>  <?php echo e($asistencia[$i]->apellido); ?></h4> </td>
           <td> <h4>  <?php echo e($asistencia[$i]->cargo); ?></h4> </td>
         </tr>
       <?php endfor; ?>

      </table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>