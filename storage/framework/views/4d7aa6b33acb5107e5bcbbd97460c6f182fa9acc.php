<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Medio de pago (Jurídico)</h3>

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


          <?php echo Form::open(array('url'=>'cliente/medio','method'=>'POST','autocomplete'=>'off')); ?>

          <?php echo e(Form::token()); ?>


          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            <label>Tipo</label>
            <select name="tipo" class="form-control">
              <option value="tarjeta">Tarjeta</option>
              <option value="cheque">Cheque</option>
            </select>
           </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="num">Numero de tarjeta o cheque</label>
             	<input type="text" name="num" class="form-control" placeholder="Numero..." value="<?php echo e(old('num')); ?>">
             </div>
            </div>


						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="marca_tajeta">Marca de tarjeta</label>
             	<input type="text" name="marca_tarjeta" class="form-control" placeholder="Marca..." value="<?php echo e(old('marca_tarjeta')); ?>">
             </div>
            </div>


           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             <label >Cliente Jurídico</label>
             <select name="fk_juridico" class="form-control">
               <?php $__currentLoopData = $juridico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($j->rif); ?>"> <?php echo e($j->d_social); ?> (<?php echo e(($j->rif)); ?>)</option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
            </div>
            </div>




             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../medio" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>


          <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>