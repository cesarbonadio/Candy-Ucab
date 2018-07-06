<?php $__env->startSection('contenido'); ?>

<style>
 #tag{
   font-size: 20px;
   font-weight: 600;
 }
</style>

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <tt><h3>Ver detalle producto:   <strong><?php echo e($producto->codigo); ?></strong></h3></tt>
    <br>
    <a href="../producto"><button class="btn btn-primary"> volver </button></a>
    <br>
    <br>

    <div class="form-group">
     <p id="tag">Nombre </p>  <?php echo e($producto->nombre); ?>

    </div>

    <div class="form-group">
     <p id="tag">Descripción</p>
     <?php if($producto->descripcion): ?>
     <?php echo e($producto->descripcion); ?>

     <?php else: ?>
        ------no info--------
     <?php endif; ?>
    </div>

    <div class="form-group">
     <p id="tag">Precio de venta</p> <?php echo e($producto->precio); ?>

    </div>

    <div class="form-group">
     <p id="tag">Ranking</p>
     <?php if($producto->ranking): ?>
     <?php echo e($producto->ranking); ?>

     <?php else: ?>
        ------no info--------
     <?php endif; ?>
    </div>

    <div class="form-group">
     <p id="tag">Foto</p>
     <?php if($producto->foto): ?>
     <?php echo e($producto->foto); ?>

     <?php else: ?>
        ------no info--------
     <?php endif; ?>
    </div>

    <div class="form-group">
     <p id="tag">Tipo de producto</p>
     <?php if($producto->fk_tipo): ?>
     <?php echo e($producto->fk_tipo); ?>

     <?php else: ?>
        ------no info--------
     <?php endif; ?>
    </div>



     </dic>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>