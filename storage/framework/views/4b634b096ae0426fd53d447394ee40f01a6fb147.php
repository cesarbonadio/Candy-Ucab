<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Diario Descuento</h3>

		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>

          <?php echo Form::open(array('url'=>'promocion/diario_descuento','method'=>'POST','autocomplete'=>'off')); ?>

          <?php echo e(Form::token()); ?>

          
              <div class="form-group">
             	<label for="c_diario">Codigo del diario</label>
             	<input type="text" name="c_diario" class="form-control" placeholder="Diario...">

             </div>

             <div class="form-group">
              <label for="c_descuento">Codigo del descuento</label>
              <input type="text" name="c_descuento" class="form-control" placeholder="Descuento...">

             </div>
             <div class="form-group">
               <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../diario_descuento" style="color: inherit;">Cancelar</a></button>
             </div>
          <?php echo Form::close(); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>