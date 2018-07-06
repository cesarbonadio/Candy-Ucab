<?php $__env->startSection('contenido'); ?>


<?php echo Form::open(array('route'=>'asistencia.import','method'=>'POST','files'=>'true')); ?>


<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<?php if(Session::has('succes')): ?>
		<div class="alert alert-succes"><?php echo e(Session::get('message')); ?> hola</div>
		<?php endif; ?>

		<?php if(Session::has('warning')): ?>
		<div class="alert alert-warning"><?php echo e(Session::get('message')); ?> chao</div>
		<?php endif; ?>
    
		<div class="form-group">
			<?php echo Form::label('sample_file','Selecionar archivo a importar',['class'=>'col-md-3']); ?>

			<div class="col-md-9">
				<?php echo Form::file('asistencia',array('class'=>'form-control')); ?>

				<?php echo $errors->first('asistencia','<p class="alert alert-danger">:message</p>'); ?>

			</div>
		</div>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2 text-center">
		<?php echo Form::submit('Importar',['class'=>'btn btn-succes']); ?>

	</div>
</div>
<?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>