<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Pagar con puntos</h3><br>
    <h4>Cantidad de puntos del cliente : <?php echo e($cantidad[0]->cantidad); ?></h4>
    <h4>Tiene: <?php echo e($cantidad[0]->total); ?> Bs en puntos</h4>
    <br>


		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
 </div>
</div>


    <?php echo Form::model($pedido,['method'=>'PATCH','route'=>['pedido.update',$pedido->codigo]]); ?>

     <?php echo e(Form::token()); ?>


      <div class = "row">

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="monto">Monto</label>
         <input type ="text" name="monto" class="form-control" placeholder="Monto..." autocomplete="off">
        </div>
      </div>

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="tipo_pago">tipo</label>
         <input type ="text" name="tipo_pago" class="form-control" value = "puntos" readonly>
        </div>
      </div>

      </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <br>
         <button class="btn btn-primary" type="submit">Guardar</button>
         <button class="btn btn-danger" type="reset"><a href="../../pedido" style="color: inherit;">Cancelar</a></button>
         </div>
        </div>


<?php echo Form::close(); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>