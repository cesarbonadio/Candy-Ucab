<?php $__env->startSection('contenido'); ?>

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Editando producto:<strong><?php echo e($producto->codigo); ?></strong></h3>

       <?php if(count($errors)>0): ?>
       <div class ="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
       </div>
       <?php endif; ?>

     <?php echo Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->codigo]]); ?>

    <?php echo e(Form::token()); ?>


    <div class ="row">

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="nombre">Nombre</label>
         <input type ="text" name="nombre"  value="<?php echo e($producto->nombre); ?>" class="form-control" placeholder="Nombre...">
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for ="descripcion">Descripcion</label>
       <input type ="text area" name="descripcion" value="<?php echo e($producto->descripcion); ?>" class="form-control" placeholder="Descripcion...">
      </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label for ="precio">Precio</label>
          <input type ="text" name="precio"  value="<?php echo e($producto->precio); ?>" class="form-control" placeholder="Precio...">
        </div>
    </div>


    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for ="ranking">Ranking</label>
       <input type ="text" name="ranking"  value="<?php echo e($producto->ranking); ?>" class="form-control" placeholder="Ranking...">
      </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label>Tipo</label>
          <select name="fk_tipo" class="form-control">
            <option value="">...</option>
            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($producto->fk_tipo==$tipo->codigo): ?>
             <option value="<?php echo e($tipo->codigo); ?>" selected><?php echo e($tipo->descripcion); ?></option>
            <?php else: ?>
             <option value = "<?php echo e($tipo->codigo); ?>"><?php echo e($tipo->descripcion); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label>foto (deshabilitado por ahora)</label>
       <input disabled type ="file" name="foto"  class="form-control">
      </div>
    </div>



  <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class = "form-group">
   <button class="btn btn-primary" type="submit">Guardar</button>
   <button class="btn btn-danger" type="reset"><a href="../../producto" style="color: inherit;">Cancelar</a></button>
  </div>
  </div>

    </div>

     <?php echo Form::close(); ?>



     </dic>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>