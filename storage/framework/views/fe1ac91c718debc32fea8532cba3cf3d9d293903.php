<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-<?php echo e($p->codigo); ?>">


	<?php echo e(Form::Open(array('action'=>array('PuntoController@destroy',$p->codigo),'method'=>'delete'))); ?>


<div class="modal-dialog">
<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      <h4 class="modal-title">Eliminar Historial de punto</h4>
			</div>

			<div class="modal-body">
				<p>¿Seguro que quiere eliminar el histórico: <strong> <?php echo e($p->codigo); ?> </strong> con valor <strong> <?php echo e($p->valor); ?></strong> ?</p>
        <p>Se van a eliminar todos los historiales de clientes.</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>

		</div>
</div>
	<?php echo e(Form::Close()); ?>

</div>
