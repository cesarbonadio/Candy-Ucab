<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Rol: <?php echo e($rol->descripcion); ?>

		</h3>



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

          <?php echo Form::model($rol,['method'=>'PATCH','route'=>['rol.update',$rol->codigo],'files'=>'true']); ?>

          <?php echo e(Form::token()); ?>


            <div class="row">
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" value="<?php echo e($rol->descripcion); ?>">
                </div>
              </div>

	
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
						      <br>
						      <button class="btn btn-primary" type="submit">Guardar</button>
 			            <button class="btn btn-danger" type="reset"><a href="../../rol" style="color: inherit;">Cancelar</a></button>
                </div>
              </div>
            </div>

          <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>