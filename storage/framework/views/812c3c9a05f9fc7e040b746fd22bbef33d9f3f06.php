<?php $__env->startSection('contenido'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Diario: <?php echo e($diario->codigo); ?></h3>

		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>

          <?php echo Form::model($diario,['method'=>'PATCH','route'=>['diario.update',$diario->codigo]]); ?>

          <?php echo e(Form::token()); ?>

            <div class="form-group">
            	<label for="descripcion">Descripcion</label>
             	<input type="text" name="descripcion" class="form-control" value="<?php echo e($diario->descripcion); ?>" placeholder="Descripcion...">

            </div>
            <div class="form-group">
             	<label for="fecha_emision">Fecha de Emision</label>
             	<input type="text" name="fecha_emision" class="form-control" value="<?php echo e($diario->fecha_emision); ?>" placeholder="Fecha Emision....">
            </div>
            <div class="form-group">
             	<label for="fecha_vencimiento">Fecha de Vencimiento</label>
             	<input type="text" name="fecha_vencimiento" class="form-control" value="<?php echo e($diario->fecha_vencimiento); ?>" placeholder="Fecha Vencimiento....">
            </div>

            <div class="form-group">
               <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../../diario" style="color: inherit;">Cancelar</a></button>
            </div>
          <?php echo Form::close(); ?>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>