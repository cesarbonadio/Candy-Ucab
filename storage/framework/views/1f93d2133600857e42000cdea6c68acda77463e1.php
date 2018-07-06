<?php $__env->startSection('contenido'); ?>

<style>
#centrar {
   text-align: center;
}
</style>


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <?php $__currentLoopData = $puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($p->fecha_fin==null): ?>
      <h3>Valor actual del punto : <?php echo e($p->valor); ?> Bsf &nbsp;
        <a href="punto/create"><button class="btn btn-succes">Actualizar valor</button>
        </a>
      </h3>
      <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th id="centrar">Código del histórico</th>
					<th>Fecha inicial</th>
					<th>Fecha final</th>
          <th>Valor</th>
				</thead>


        <?php $__currentLoopData = $puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <tr>
					<td id="centrar"><?php echo e($p->codigo); ?></td>
					<td><?php echo e($p->fecha_inicio); ?></td>
          <?php if($p->fecha_fin!=null): ?>
					<td><?php echo e($p->fecha_fin); ?></td>
					<td><?php echo e($p->valor); ?></td>
          <td>
						<a href="" data-target="#modal-delete-<?php echo e($p->codigo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
          <?php else: ?>
          <td>Por definir</td>
          <td><?php echo e($p->valor); ?></td>
				   <?php endif; ?>
         <?php echo $__env->make('administrar.punto.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>


	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>