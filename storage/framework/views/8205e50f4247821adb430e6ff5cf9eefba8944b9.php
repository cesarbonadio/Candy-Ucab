<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente Juridico: <?php echo e($juridico->d_social); ?>

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

          <?php echo Form::model($juridico,['method'=>'PATCH','route'=>['juridico.update',$juridico->rif],'files'=>'true']); ?>

          <?php echo e(Form::token()); ?>


           <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
              <label for="rif">RIF</label>
              <input type="text" name="rif" class="form-control" value="<?php echo e($juridico->rif); ?>">
             </div>
           </div>

	
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="correo">Correo</label>
              <input type="text" name="correo" class="form-control" value="<?php echo e($juridico->correo); ?>">
              </div>
               </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="d_social">D.Social</label>
              <input type="text" name="d_social" class="form-control" value="<?php echo e($juridico->d_social); ?>">

             </div>
              </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

              <div class="form-group">
              <label for="r_social">R.Social</label>
              <input type="text" name="r_social" class="form-control" value="<?php echo e($juridico->r_social); ?>">

             </div>
              </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="pagina_web">Pagina Web</label>
              <input type="text" name="pagina_web" class="form-control" value="<?php echo e($juridico->pagina_web); ?>">
              </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
              <label for="capital">Capital</label>
              <input type="text" name="capital" class="form-control" value="<?php echo e($juridico->capital); ?>">
               </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label>Lugar</label>
              <select name="fk_lugar" class="form-control">
                <?php $__currentLoopData = $lugar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($lug->codigo==$juridico->fk_lugar): ?>
                <option value="<?php echo e($lug->codigo); ?>" selected><?php echo e($lug->nombre); ?></option>
                <?php else: ?>
                <option value="<?php echo e($lug->codigo); ?>"><?php echo e($lug->nombre); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>

             </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label >Lugar Fiscal</label>
              <select name="fk_lugar_fiscal" class="form-control">
                <?php $__currentLoopData = $lugar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($lug->codigo==$juridico->fk_lugar_fiscal): ?>
                <option value="<?php echo e($lug->codigo); ?>" selected> <?php echo e($lug->nombre); ?> (<?php echo e($lug->tipo); ?>) </option>
                 <?php else: ?>
                <option value="<?php echo e($lug->codigo); ?>"><?php echo e($lug->nombre); ?> (<?php echo e($lug->tipo); ?>)</option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
             </div>
            </div>



           <?php if($juridico->fk_tienda==null): ?>
					 <!--valida si la tienda es nula para no poder cambiarla (esto es porque ya se generó el carnet)-->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
               <label>Tienda</label>
               <select name="fk_tienda" class="form-control">
								 <option value="">...</option>
                <?php $__currentLoopData = $tienda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($ti->codigo==$juridico->fk_tienda): ?>
                <option value="<?php echo e($ti->codigo); ?>" selected><?php echo e($ti->nombre); ?> (<?php echo e($ti->tipo); ?>)</option>
                <?php else: ?>
                <option value="<?php echo e($ti->codigo); ?>"><?php echo e($ti->nombre); ?> (<?php echo e($ti->tipo); ?>)</option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
              </div>
             </div>
				  <?php endif; ?>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="telefono">Agregar un telefono Nuevo</label>
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
 			        <button class="btn btn-danger" type="reset"><a href="../../juridico" style="color: inherit;">Cancelar</a></button>
              </div>
             </div>
           </div>

          <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>