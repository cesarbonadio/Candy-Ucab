<?php $__env->startSection('carrito'); ?>



<br/>
<div class="carousel-item active">
    <div class="row">
    		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
   		<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 33%">Foto del producto</th>
        <th style="width: 33%">Nombre del producto</th>
        <th style="width: 20%">Precio</th>
      </tr>
    </thead>
    <tbody>

      <tr style="background-color: #2b2e34">
        <td><img src="Imagenes/<?php echo e($producto[0]->foto); ?>" class="img-fluid" style="border-radius: 5%; border: solid;"></td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold; top:30%"><?php echo e($producto[0]->nombre); ?></td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold; top:30%"><?php echo e($producto[0]->precio); ?> bs</td>

      </tr>
    </tbody>
  </table>
  <?php echo Form::open(array('url'=>'usuario/addToCart','method'=>'POST','autocomplete'=>'off')); ?>

  <?php echo e(Form::token()); ?>

  	<div>	
  		<label for="cantidad"> Cantidad a pedir: 	</label>
  		<input type="number" name="cantidad" value="1" min="1">
  		<input type="text" style="display: none;" name="producto" value="<?php echo e($producto[0]->codigo); ?>">
		<button type="submit" class="btn botonAddToCart">Añadir</button>
  	</div>
  <?php echo Form::close(); ?>


    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.usuario.carrito', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>