<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Pagar</h3>

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


		<?php if($medio == null): ?>
		<div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
			 <br>
			 <h4 >No tiene medios de pago este cliente <button class="btn btn-success" type="reset"><a href="../../pedido" style="color: inherit;">volver</a></button></h4>
		</div>
		<?php else: ?>

   <div class = "row">

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
      <label>Escoger medio de pago del cliente</label>
        <select name="fk_medio_pago" class="form-control">
        <?php $__currentLoopData = $medio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $me): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($me->num_cheque==null): ?>
        <?php if($me->marca_tarjeta==null): ?>
        <option value="<?php echo e($me->codigo); ?>">Tarjeta <?php echo e($me->num_tarjeta); ?></option>
        <?php else: ?>
        <option value="<?php echo e($me->codigo); ?>">Tarjeta <?php echo e($me->num_tarjeta); ?> (<?php echo e($me->marca_tarjeta); ?>)</option>
        <?php endif; ?>
        <?php elseif($me->num_tarjeta==null): ?>
        <option value="<?php echo e($me->codigo); ?>">Cheque <?php echo e($me->num_cheque); ?></option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </select>
     </div>
   </div>


   <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
      <label for ="monto">Monto a pagar</label>
      <input type ="text" name="monto" class="form-control" placeholder="Monto..." autocomplete="off">
     </div>
   </div>


	 <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
		 <div class="form-group">
			<label for ="tipo_pago">tipo</label>
			<input type ="text" name="tipo_pago" class="form-control" value = "medios" readonly>
		 </div>
	 </div>


     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
       <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset"><a href="../../pedido" style="color: inherit;">Cancelar</a></button>
      </div>
     </div>

		 <?php endif; ?>

  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>