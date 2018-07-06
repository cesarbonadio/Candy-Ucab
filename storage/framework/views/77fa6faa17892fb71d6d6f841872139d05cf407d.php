<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Cliente Juridico</h3>

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


          <?php echo Form::open(array('url'=>'cliente/juridico','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

          <?php echo e(Form::token()); ?>


          <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             	<label for="rif">RIF</label>
             	<input type="text" name="rif" class="form-control" placeholder="RIF..." value="<?php echo e(old('rif')); ?>">
             </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="correo">Correo</label>
             	<input type="text" name="correo" class="form-control" placeholder="Correo..." value="<?php echo e(old('correo')); ?>">
             </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="d_social">D.Social</label>
             	<input type="text" name="d_social" class="form-control" placeholder="D.Social..." value="<?php echo e(old('d_social')); ?>">
             </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="r_social">R.Social</label>
             	<input type="text" name="r_social" class="form-control" placeholder="R.Social..." value="<?php echo e(old('r_social')); ?>">
             </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="pagina_web">Pagina Web</label>
             	<input type="text" name="pagina_web" class="form-control" placeholder="Pagina Web..." value="<?php echo e(old('pagina_web')); ?>">
            </div>
            </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
              <label for="capital">Capital</label>
              <input type="text" name="capital" class="form-control" placeholder="Capital..." value="<?php echo e(old('capital')); ?>">
             	 </div>
           </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label>Lugar</label>
             	<select name="fk_lugar" class="form-control">
                <?php $__currentLoopData = $lugar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lug->codigo); ?>"><?php echo e($lug->nombre); ?> (<?php echo e(($lug->tipo)); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
             </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label >Lugar Fiscal</label>
              <select name="fk_lugar_fiscal" class="form-control">
                <?php $__currentLoopData = $lugar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lug->codigo); ?>"> <?php echo e($lug->nombre); ?> (<?php echo e(($lug->tipo)); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
             </div>
             </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label>Tienda</label>
             	<select name="fk_tienda" class="form-control">
								<option value="">...</option>
                <?php $__currentLoopData = $tienda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($ti->codigo); ?>"><?php echo e($ti->nombre); ?> (<?php echo e(($ti->tipo)); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
             </div>
             </div>



              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo e(old('telefono')); ?>" placeholder="Numero de telefono...">
               </div>
             </div>
						 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="form-group">
							  <label for="tipo_telefono">Tipo de telefono</label>
								<select name="tipo_telefono" class="form-control">
									<option value="radio">radio</option>
	                <option value="fax">fax</option>
									<option value="movil">movil</option>
									<option value="fijo">fijo</option>
									<option value="trabajo">trabajo</option>
									<option value="casa">casa</option>
	              </select>
							 </div>
						  </div>


             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../juridico" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>
           </div>
          <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>