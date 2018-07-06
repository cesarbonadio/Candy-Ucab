<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Asignar privilegio</h3>

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
          <?php echo Form::open(array('url'=>'gestion/usuario','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

          <?php echo e(Form::token()); ?>


          <div class="row">

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="username">Username</label>
             	  <input type="text" name="username" class="form-control" placeholder="Nombre de usuario...">
              </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="password">Password</label>
             	  <input type="text" name="password" class="form-control" placeholder="Contraseña...">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="puntos">Puntos</label>
             	  <input type="text" name="puntos" class="form-control" placeholder="Puntos...">
              </div>
            </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label >Rol</label>
                  <select name="fk_rol" class="form-control">
                    <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($rl->codigo); ?>"> <?php echo e($rl->descripcion); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="fk_juridico">Fk Juridico</label>
             	  <input type="text" name="fk_juridico" class="form-control" placeholder="Fk Juridico...">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="fk_naturale">Fk Naturale</label>
             	  <input type="text" name="fk_naturale" class="form-control" placeholder="Fk Naturale...">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="fk_empleado">Fk Empleado</label>
             	  <input type="text" name="fk_empleado" class="form-control" placeholder="Fk Empleado...">
              </div>
            </div>


             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../usuario" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>
           </div>
          <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>