<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Presupuesto (Natural)</h3>

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

          <?php echo Form::open(array('url'=>'cliente/presupuesto','method'=>'POST','autocomplete'=>'off')); ?>

          <?php echo e(Form::token()); ?>


          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
             <label>Cedula del cliente</label>
              <input type="text" name="fk_naturale" class="form-control" placeholder="Cédula..." value="<?php echo e(old('fk_naturale')); ?>">
            </div>
           </div>

           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             <label>Tienda donde se realiza la compra</label>
             <select name="fk_tienda_compra" class="form-control">
               <?php $__currentLoopData = $tienda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($t->codigo); ?>"> <?php echo e($t->nombre); ?> (<?php echo e(($t->tipo)); ?>)</option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
               <label>Producto (1)</label>
                <input type="text" name="producto1" class="form-control" placeholder="Código..." value="<?php echo e(old('producto1')); ?>">
              </div>
             </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label>Cantidad (1)</label>
                 <input type="number" name="cantidad1" class="form-control" placeholder="Cantidad..." value="<?php echo e(old('cantidad1')); ?>">
               </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                 <label>Producto (2)</label>
                  <input type="text" name="producto2" class="form-control" placeholder="Código..." value="<?php echo e(old('producto2')); ?>">
                </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                  <label>Cantidad (2)</label>
                   <input type="number" name="cantidad2" class="form-control" placeholder="Cantidad..." value="<?php echo e(old('cantidad2')); ?>">
                 </div>
                </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                 <label>Producto (3)</label>
                  <input type="text" name="producto3" class="form-control" placeholder="Código..." value="<?php echo e(old('producto3')); ?>">
                </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                  <label>Cantidad (3)</label>
                   <input type="number" name="cantidad3" class="form-control" placeholder="Cantidad..." value="<?php echo e(old('cantidad3')); ?>">
                 </div>
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                   <label>Producto (4)</label>
                    <input type="text" name="producto4" class="form-control" placeholder="Código..." value="<?php echo e(old('producto4')); ?>">
                  </div>
                 </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                   <div class="form-group">
                    <label>Cantidad (4)</label>
                     <input type="number" name="cantidad4" class="form-control" placeholder="Cantidad..." value="<?php echo e(old('cantidad4')); ?>">
                   </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                     <label>Producto (5)</label>
                      <input type="text" name="producto5" class="form-control" placeholder="Código..." value="<?php echo e(old('producto5')); ?>">
                    </div>
                   </div>

                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <div class="form-group">
                      <label>Cantidad (5)</label>
                       <input type="number" name="cantidad5" class="form-control" placeholder="Cantidad..." value="<?php echo e(old('cantidad5')); ?>">
                     </div>
                    </div>




             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../presupuesto" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>

          <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>