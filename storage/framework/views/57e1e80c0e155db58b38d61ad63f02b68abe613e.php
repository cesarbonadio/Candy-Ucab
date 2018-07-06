<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Actualizar punto</h3>

<!--si necesito esto porque no puede ingresar un valor que no sea entero
    ni tampoco el mismo valor que el actual (unique pero no es unico en la
		base de datos pero si en el valor actual) utilizar custom messages-->
		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>


          <?php echo Form::open(array('url'=>'administrar/punto','method'=>'POST','autocomplete'=>'off')); ?>

          <?php echo e(Form::token()); ?>


             <div class="form-group">
             	<label for="valor">Ingrese nuevo valor</label>
             	<input type="text" name="valor" class="form-control" value="<?php echo e(old('valor')); ?>" placeholder="valor...">

             </div>
             <div class="form-group">
               <button class="btn btn-primary" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset"><a href="../punto" style="color: inherit;">Cancelar</a></button>
             </div>

          <?php echo Form::close(); ?>


	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>