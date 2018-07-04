<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-<?php echo e($des->codigo); ?>">


	<?php echo e(Form::Open(array('action'=>array('DescuentoController@destroy',$des->codigo),'method'=>'delete'))); ?>


<div class="modal-dialog">
<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      <h4 class="modal-title">Eliminar Descuento</h4>
			</div>

			<div class="modal-body">
				<p>¿Seguro que quiere eliminar el descuento: <strong> <?php echo e($des->descripcion); ?> </strong> de codigo <strong> <?php echo e($des->codigo); ?></strong> ?</p>
				<p> También elminiaría todas las posibles relaciones de este descuento con algún diario. </p>
			</div>
			
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    				<button type="submit" class="btn btn-primary">Confirmar</button>
    			</div>
    		</div>
    </div>
	<?php echo e(Form::Close()); ?>

</div>
