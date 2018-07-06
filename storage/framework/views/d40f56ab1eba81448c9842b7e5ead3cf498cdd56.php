<?php $__env->startSection('contenido'); ?>

<div class="row">
 <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
   <h3> Listado de Productos <a href="producto/create"><button class="btn btn-succes"> Crear un producto </button></a></h3>
   <?php echo $__env->make('administrar.producto.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </div>
</div>
<br>

<div class="row">
 <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="table-responsive">
     <table class = "table table-striped table-dark">
      <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Ranking</th>
        <th>Foto</th>
        <th>Tipo producto</th>
        <th>Opciones</th>
      </thead>



      <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <tr>
         <td align="center"><?php echo e($pro->codigo); ?></td>
           <td><?php echo e($pro->nombre); ?></td>

           <?php if(strlen($pro->descripcion)<=40): ?>
           <td><?php echo e($pro->descripcion); ?></td>
           <?php else: ?>
          <td><?php echo e(substr($pro->descripcion,0,strlen($pro->descripcion)/3)); ?>...</td>
           <?php endif; ?>

          <td><?php echo e($pro->precio); ?></td>
          <td align="center"> <?php echo e($pro->ranking); ?> </td>
          <td><?php echo e($pro->foto); ?></td>
          <td align="center"><?php echo e($pro->fk_tipo); ?></td>

               <td>
                 <a href="<?php echo e(URL::action('ProductoController@edit',$pro->codigo)); ?>"><button class = "btn btn-info">Editar</button>
                 <a href="<?php echo e(URL::action('ProductoController@show',$pro->codigo)); ?>"><button class = "btn btn-primary">Ver</button>
                 <a href="" data-target="#modal-delete-<?php echo e($pro->codigo); ?>" data-toggle="modal"><button class = "btn btn-danger">Eliminar</button>
               </td>
      </tr>

      <?php echo $__env->make('administrar.producto.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <table>
   </div>

 </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>