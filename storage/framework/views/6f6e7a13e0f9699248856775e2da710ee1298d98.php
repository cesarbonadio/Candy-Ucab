<?php $__env->startSection('contenido'); ?>


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Factura de compras (todos los pagos) &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h4>Total cancelado</h4></th>
          <th><h4>Pedido</h4></th>
          <th><h4>Cedula/Rif</h4></th>
          <th><h4>Nombre o D.Social</h4></th>
          <th><h4>Apellido o R.Social</h4></th>
          <th><h4>Fecha del pedido</h4></th>
        </thead>


       <?php for($i=0; $i<=sizeof($factura)-1; $i++): ?>
         <tr>
           <td> <h4>  <?php echo e($factura[$i]->suma); ?>  </h4> </td>
           <td> <h4>  <?php echo e($factura[$i]->pedido); ?>  </h4> </td>
           <td> <h4>  <?php echo e($factura[$i]->idcliente); ?>  </h4> </td>
           <td> <h4>  <?php echo e($factura[$i]->nombre); ?>  </h4> </td>
           <td> <h4>  <?php echo e($factura[$i]->apellido); ?>  </h4> </td>
           <td> <h4>  <?php echo e($factura[$i]->fecha_pedido); ?>  </h4> </td>
         </tr>
       <?php endfor; ?>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>