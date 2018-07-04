<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Rol:
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

          <?php echo Form::model($rolprivilegio,['method'=>'PATCH','route'=>['rolprivilegio.update',$rolprivilegio->codigo],'files'=>'true']); ?>

          <?php echo e(Form::token()); ?>


            <div class="row">

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label >Rol</label>
                  <select name="c_rol" class="form-control">
                    <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($rl->codigo); ?>"> <?php echo e($rl->descripcion); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

              <div class="form-group">
              <label >Privilegio</label>
              <select name="c_priv" class="form-control">
                <?php $__currentLoopData = $privilegio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($priv->codigo); ?>"> <?php echo e($priv->descripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
             </div>
             </div>
	
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
						      <br>
						      <button class="btn btn-primary" type="submit">Guardar</button>
 			            <button class="btn btn-danger" type="reset"><a href="../../rolprivilegio" style="color: inherit;">Cancelar</a></button>
                </div>
              </div>
            </div>

          <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>