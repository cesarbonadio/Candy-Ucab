<?php $__env->startSection('contenido'); ?>

<div class="row">
 <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
   <h3> Listado de Tiendas <a href="tienda/create"><button class="btn btn-succes"> Registrar una tienda </button></a></h3>
   <?php echo $__env->make('administrar.tienda.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </div>
</div>
<br>


<div class="row">
 <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="table-responsive">
     <table class = "table table-striped table-dark">
      <thead>
        <th>Codigo</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Lugar</th>
        <th>Opciones</th>
      </thead>

      <?php $__currentLoopData = $tiendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <tr>
         <td align="center"><?php echo e($tien->codigo); ?></td>
           <td><?php echo e($tien->tipo); ?></td>
           <td><?php echo e($tien->nombre); ?></td>
           <td align="center"><?php echo e($tien->fk_lugar); ?></td>

               <td>
                 <a href="<?php echo e(URL::action('TiendaController@edit',$tien->codigo)); ?>"><button class = "btn btn-info">Editar</button>
                 <a href="<?php echo e(URL::action('TiendaController@show',$tien->codigo)); ?>"><button class = "btn btn-primary">Ver</button>
                 <a href="" data-target="#modal-delete-<?php echo e($tien->codigo); ?>" data-toggle="modal"><button class = "btn btn-danger">Eliminar</button>
               </td>
      </tr>

      <?php echo $__env->make('administrar.tienda.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <table>
   </div>


 </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>