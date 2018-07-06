<?php $__env->startSection('contenido'); ?>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Top 10 clientes por Compra en tienda &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Rif o Cédula</h3></th>
          <th><h3>Nombre o Denominacion social</h3></th>
          <th><h3>Cantidad de compras</h3></th>
        </thead>

       <?php $j = 0; ?>
       <?php for($i=0; $i<=sizeof($cliente)-1; $i++): ?>
         <?php if($j == 10): ?> <?php break; ?> <?php endif; ?>
         <tr>
           <td> <h4>  <?php echo e($cliente[$i]->id); ?>  </h4> </td>
           <td> <h4>  <?php echo e($cliente[$i]->nombre); ?></h4> </td>
           <td> <h4>  <?php echo e($cliente[$i]->suma); ?></h4> </td>
         </tr>
         <?php $j++; ?>
       <?php endfor; ?>

		 </table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>